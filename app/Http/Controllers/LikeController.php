<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class LikeController extends Controller
{
    public function toggleLike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', auth()->id)->first();
        if ($like) {
            $like->delete();
        } else {
            Like::create(['post_id' => $id, 'user_id' => auth()->id]);
        }
        return back();
    }
}
