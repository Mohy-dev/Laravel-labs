<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(7);
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view("posts.create", ["users" => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "title" => "required|min:5|unique:posts", // title is in posts table
                "description" => "required|min:10"
            ],
            ["title.required" => "No empty titles"],
            ["title.unique" => "Unique titles are only allowed"],
            ["title.min" => "Title should be at least 3 char"],
            ["description" => "no empty inputs"],
            ["description.min" => "descrption at least 10 char"]
        );

        Post::create([
            "title" => $request->all()["title"],
            "description" => $request->all()["description"],
            "user_id" => $request->all()["user_id"]
        ]);

        return to_route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $users = User::all();
        return view("posts.edit", ["post" => $post, "users" => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate(
            [
                "title" => "required|min:5|unique:posts", // title is in posts table
                "description" => "required|min:10"
            ],
            ["title.required" => "No empty titles"],
            ["title.unique" => "Unique titles are only allowed"],
            ["title.min" => "Title should be at least 3 char"],
            ["description" => "no empty inputs"],
            ["description.min" => "descrption at least 10 char"]
        );

        Post::create([
            "title" => $request->all()["title"],
            "description" => $request->all()["description"],
            "user_id" => $request->all()["user_id"]
        ]);

        $post->update($request->all());
        return to_route("post.show", $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("posts.index");
    }
}
