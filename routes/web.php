<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

// Route::get("/posts", [PostController::class, "index"])->name("posts.index");

// Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");

// Route::post("/posts", [PostController::class, "store"])->name("posts.store");

// Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");

// Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");

// Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");

// Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy");

// Route::get("/userposts/{user}", [UserController::class, "userposts"])->name("user.posts");


Route::resource("posts", PostController::class);

Route::resource("posts", PostController::class)->middleware("auth");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
