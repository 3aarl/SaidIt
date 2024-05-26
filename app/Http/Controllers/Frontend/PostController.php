<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Community;
use Inertia\Inertia;

class PostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $community = Community::where('slug', $community_slug)->first();
        $post = Post::where('slug', $slug)->first();

        return Inertia::render('Frontend/Posts/Show', compact('community', 'post'));

    }
}
