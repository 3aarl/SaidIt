<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCommunityController extends Controller
{
    function show($slug){
        $subCommunity = Community::where('slug', $slug)->first();

        return Inertia::render('SubCommunities/Show', compact('subCommunity'));
    }
}
