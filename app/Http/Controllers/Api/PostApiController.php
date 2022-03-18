<?php

namespace App\Http\Controllers\Api;

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostApiController extends Controller
{
    //
    function index()
    {
        return Post::all();
    }
}

function show($post)
{
    return Post::findOrFail($post);
}


function store()
{
    $post = Post::create(request()->all());
    return $post;
}

function update($post)
{
    $postdata = Post::findOrFail($post);
    return Post::findOrFail($post);
}
function destroy($post)
{
    $data = Post::findOrFail($post);
    $data->delete();

    return "deleted";
}
