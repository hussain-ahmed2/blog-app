<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        Comment::create([
            'post_id' => $id,
            'user_id' => auth()->id,
            'content' => $request->content,
        ]);
        return back();
    }
}
