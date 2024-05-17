<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'product_id' => 'required|exists:products,id',
        ]);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->user_id = auth()->user()->id; // hoặc lấy ID người dùng theo cách khác nếu cần
        $comment->product_id = $request->input('product_id');
        $comment->save();

        return redirect()->route('home.show', ['id' => $request->input('product_id')])->with('success', 'Comment added successfully.');
    }
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('edit_comment', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $request->validate([
            'comment' => 'required',
        ]);
        
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('home.show', ['id' => $comment->product_id])->with('success', 'Comment updated successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $productId = $comment->product_id;
        $comment->delete();

        return redirect()->route('home.show', ['id' => $productId])->with('success', 'Comment deleted successfully.');
    }
}
