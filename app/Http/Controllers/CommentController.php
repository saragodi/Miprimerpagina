<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(30);

        return view('back.comments.index')
            ->with('comments', $comments);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->company = $request->company;

        $comment->save();

        return redirect()->back();
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->company = $request->company;

        $comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->back();
    }
}
