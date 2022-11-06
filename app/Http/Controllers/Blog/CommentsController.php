<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->paginate(5);

        return view('blog.comments.index', compact('post','comments'));
    }

    public function create(Post $post)
    {
        return view('blog.comments.create', compact('post'));
    }

    public function store(CommentRequest $request)
    {
        $post = Post::find($request->post_id);

        Comment::create([
           'title'         => $request->title,
           'description'   => $request->description,
           'user_id'       => $request->user_id,
           'post_id'       => $request->post_id
        ]);

        return redirect()->route('comments.index', $post)->with('success','Коментарий успешно оставлен!');
    }
}
