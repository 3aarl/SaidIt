<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Backend\PostVoteController;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use App\Http\Controllers\Frontend\WelcomeController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/s/{slug}', [FrontendCommunityController::class, 'show'])->name('frontend.communities.show');
Route::get('/s/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('frontend.communities.post.show');
Route::post('/s/{community_slug}/posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('frontend.posts.comments');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource(name: '/communities', controller: CommunityController::class);
    Route::resource(name: '/communities.posts', controller: CommunityPostController::class);

    Route::post('/posts/{post:slug}/upVote', [PostVoteController::class, 'upVote'])->name('posts.upVote');
    Route::post('/posts/{post:slug}/downVote', [PostVoteController::class, 'downVote'])->name('posts.downVote');
});
require __DIR__ . '/auth.php';
