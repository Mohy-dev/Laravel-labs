@extends("layouts/bloglayout")

@section("pageTitle")
    Create Post
@endsection

@section("maincontent")
    <form class="form-control m-4" action="{{route("posts.store")}}" method="POST" >
        @csrf
        <div class="mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" >

            {{-- error message --}}
            @error('title')
            <div class="alert alert-danger m-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" >
              {{-- error message --}}

              @error('description')
              <div class="alert alert-danger m-1">{{ $message }}</div>
              @enderror
        </div>

        <div class="mb-3">
            <label  class="form-label">Info</label>
            <input type="text" name="info" class="form-control" >
        </div>

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>


        <div class="mb-3">
            <label class="form-label">Users list</label>
            <select name="user_id" class="form-select">
                <option selected disabled value="">Users</option>
                @foreach($users as $user)
                <option value="{{$user->id}}" >{{$user->name}}</option>
                @endforeach
            </select>
        </div>

    </form>

@endsection
