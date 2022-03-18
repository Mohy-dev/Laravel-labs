@extends("layouts/bloglayout")

@section("pageTitle")
    Show Post
@endsection

<?php
        use Carbon\Carbon;
        // $carbon = new Carbon();
        // $now = carbon::now();
        $created = Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d-m-Y');
        $updated = Carbon::createFromFormat('Y-m-d H:i:s', $post->updated_at)->format('d-m-Y H-i');
?>

@section("maincontent")
    <div class="card m-4">
        <div class="card-header">
            Post Details
        </div>

        <div class="card-body">
            <h3 class="card-title">Tittle: {{$post->title}}</h3>
            <hr>
            <h3 class="card-text">Description: {{$post->description}}</h3>
            <hr>
            <h3 class="card-text">Info: {{$post->info}}</h3>
            <hr>
            {{-- carbon here --}}

            <h3 class="card-text">Created at: <?php  echo $created; ?> </h3>
            <hr>
            <h3 class="card-text">Updated at: <?php  echo $updated; ?></h3>
            <hr>
            <a href="{{route("posts.index")}}" class="btn btn-primary">Back to all posts</a>
        </div>
    </div>
@endsection
