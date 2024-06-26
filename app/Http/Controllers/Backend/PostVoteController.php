<?php

namespace App\Http\Controllers\Backend;

use App\Models\PostVote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostVoteController extends Controller
{
    public function upVote(Post $post){
        $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();
        if(is_null($isVoted)){
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => 1
            ]);
            $post->increment('votes',1);
            return redirect()->back();
        } else if($isVoted->vote === -1){
            $isVoted->update([
                'vote' => 1
            ]);
            $post->increment('votes',2);
            return redirect()->back();
        } else if($isVoted->vote === 1){
            return redirect()->back();
        }
    }
    public function downVote(Post $post){
        $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();
        if(is_null($isVoted)){
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => -1
            ]);
            $post->decrement('votes',1);
            return redirect()->back();
        } else if($isVoted->vote === -1){
            return redirect()->back();
        } else if($isVoted->vote === 1){
            $isVoted->update([
                'vote' => -1
            ]);
            $post->decrement('votes',2);
            return redirect()->back();
        }
    }
}
