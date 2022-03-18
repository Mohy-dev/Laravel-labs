<?php

namespace App\Http\Controllers;


// use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;



class PostController extends Controller
{

    function index()
    {
        $posts = Post::paginate(5);
        return view("posts.index", ["posts" => $posts]);
    }

    function create()
    {
        $users = User::all();
        return view("posts.create", ["users" => $users]);
    }

    function store()
    {
        $data = request()->all();
        $p = new Post();
        $p->title = $data["title"];
        $p->description = $data["description"];
        // $p->user_id = request("user_id");
        $p->save();
        return redirect(route("posts.index"));
    }

    function show($post)
    {
        // carbon here
        $data = Post::find($post);
        $users = User::all();
        // $carbon = new Carbon();
        // $users['created_at'];
        // $now = Carbon::now();
        // dd($now);
        return view("posts.show", ["post" => $data, "users" => $users]);
    }

    function edit($entry)
    {
        $row = Post::find($entry);
        return view("posts.edit", ["post" => $row]);
    }

    function update($entry)
    {
        $row = Post::find($entry);
        $row->title = request("title");
        $row->description = request("description");
        // $row->info = request("info");
        // $row->user_id = request("user_id");
        $row->save();
        return redirect(route("posts.index"));
    }

    function destroy($entry)
    {
        Post::find($entry)->delete();
        return redirect(route("posts.index"));
    }
}
