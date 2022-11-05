<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::withTrashed()->paginate(5);

        return view('blog.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.posts.create');
    }

    public function store(PostRequest $request)
    {
        Post::firstOrCreate([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'description' => $request->description,
            'user_id'     => $request->user_id
        ]);

        return redirect()->route('posts.index')->with('success', sprintf(
            'Пост %s успешно создан!',
            $request->title
        ));
    }

    public function edit(Post $post)
    {
        return view('blog.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title       = $request->title;
        $post->slug        = $request->title;
        $post->description = $request->description;
        $post->update();

        return redirect()->route('posts.index')->with('success', sprintf(
            'Пост успешно обновлен!'
        ));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Пост успешно удален!');
    }

    public function restore(Post $post)
    {
        $post->restore();

        return redirect()->route('posts.index')
            ->with('success', 'Пост успешно востановлен!');
    }

    public function show(Post $post)
    {
        return view('blog.posts.show', compact('post'));
    }
}
