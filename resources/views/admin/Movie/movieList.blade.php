@extends('layouts.admin')
@section('adminContent')
    <div class="container-fluid">

        <h2 class="text-center pt-3 m-0"> Movie Table</h2>

        <div class="add--movie text-right pb-2 mr-3 ">
            <a class="btn btn-primary" href="{{ route('movies.create') }}">
                <i class="nav-icon far fa-plus-square"></i>
                Add Movie
            </a>
        </div>

        @if($movies->count() > 0)
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Cast</th>
                    <th>Director</th>
                    <th>Genre</th>
                    <th>Language</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Edit</th>
                    <th>Delete </th>
                </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{$movie->id }}</td>
                        <td>{{$movie->name}}</td>
                        <td>{{$movie->cast}}</td>
                        <td>{{$movie->director}}</td>
                        <td>{{$movie->genre}}</td>
                        <td>{{$movie->language}}</td>
                        <td>{{$movie->description}}</td>
                        <td>
                            <img src="{{asset('images/Movies')}}/{{$movie->thumbnail}}" alt="" class="img-thumbnail" style="max-height: 200px;">
                        </td>
                        <td>
                            <a href="{{ route('movies.edit',$movie->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>

                        <form action="{{ route('movies.destroy',$movie->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Delete</button>
                        </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex">
                {!! $movies->links() !!}
            </div>
        @else
            <h1>No data Found</h1>
        @endif

    </div>
@endsection
