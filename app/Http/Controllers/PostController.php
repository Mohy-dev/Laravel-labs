<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Sluggable;

class PostController extends Controller
{

    function __construct()
    {
        $this->middleware("auth")->only("index", "store", "update", "destory");
    }

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
    public function store(PostRequest $request)
    {


        // $request["user_id"] = Auth::user()->id;
        Post::create($request->all());


        // $post->slug = \Str::slug($request->title);

        // Post::create([
        //     "title" => $request->all()["title"],
        //     "description" => $request->all()["description"],
        //     "user_id" => $request->all()["user_id"]
        // ]);

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


        // Post::create([
        //     "title" => $request->all()["title"],
        //     "description" => $request->all()["description"],
        //     // "user_id" => $request->all()["user_id"]
        // ]);

        $user = Auth::user();
        if ($post->user->id == $user->id) {
            $post->update($request->all());
            return to_route("posts.show", $post);
        }

        return abort(403);
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
