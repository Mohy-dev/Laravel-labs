@extends("layouts/bloglayout")

@section("pageTitle")
    Edit Post
@endsection

@section("maincontent")
    <form class="form-control m-4" action="{{route("posts.update",$post->id)}}" method="POST">

        @csrf
        @method("put")
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" >
            @error('title')
            <div class="alert alert-danger m-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text"  value="{{$post->description}}" name="description" class="form-control  @error('description') is-invalid @enderror" >
            @error('description')
            <div class="alert alert-danger m-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection
