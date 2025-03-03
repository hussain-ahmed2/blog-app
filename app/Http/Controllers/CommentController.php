<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store($id)
    {
        $content = request()->get('content');

        request()->validate([
            'content' => ['required', 'min:2']
        ]);

        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'content' => $content,
        ]);

        return back();
    }
}
