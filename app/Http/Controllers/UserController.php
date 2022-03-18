<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    function index()
    {
        $users = User::all();
        return view("posts.index", ["users" => $users]);
    }

    function create()
    {
        return view("posts.create");
    }

    function store()
    {
        $data = request()->all();
        $p = new User();
        $p->name = $data["name"];
        $p->email = $data["email"];
        $p->password = $data["password"];
        $p->save();
        return redirect(route("posts.index"));
    }

    function show($user)
    {
        $row = User::find($user);
        return view("posts.show", ["user" => $row]);
    }

    function edit($entry)
    {
        $row = User::find($entry);
        return view("posts.edit", ["user" => $row]);
    }

    function update($entry)
    {
        $row = User::find($entry);
        $row->name = request("name");
        $row->email = request("email");
        $row->password = request("password");
        $row->save();
        return redirect(route("posts.index"));
    }

    function destroy($entry)
    {
        User::find($entry)->delete();
        return redirect(route("posts.index"));
    }
}
