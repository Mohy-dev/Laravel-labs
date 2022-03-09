@extends("layouts/bloglayout")

@section("pageTitle")
    Posts index
@endsection

<script>
    function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
   </script>

@section("maincontent")
    <div class="text-center m-3">
        <td><a href="{{route("posts.create")}}" class="btn btn-success">Add New Post </a></td>

    </div>
    <table class="table table-dark">
        <tr class="text-center">
            <th> ID </th>
            <th> Title </th>
            <th> Description </th>
            <th> Info </th>
            <th> View </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>
        @foreach($posts as $post)

            <tr class="text-center m-1">
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->info}}</td>

                <td><a href="{{route("posts.show",$post["id"])}}" class="btn btn-info m-1">View </a></td>
                <td><a href="{{route("posts.edit",$post["id"])}}" class="btn btn-warning m-1">Edit </a></td>
                <td>
                    {{-- turn around to excute the delete query by overiding in form --}}
                    <form action="{{route("posts.destroy",$post["id"])}}" method="POST" onclick="return myFunction();">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-danger m-1">
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}
@endsection
