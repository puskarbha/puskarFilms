@extends('layouts.admin')
@section('adminContent')
    <div class="container">

        <h2> Movie Table</h2>

        <div class="add--branch">
            <a href="{{ route('addMovie') }}">
                <i class="nav-icon far fa-plus-square"></i>
                Add Movie
            </a>
        </div>

        @if($movies->count() > 0)
            <table class="table table-bordered">
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
                        <td>image</td>
                        <td>
                            <a href="{{ route('editMovie', ['id' => $movie->id]) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a href="{{ route('deleteMovie', ['id' => $movie->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @else
            <h1>No data Found</h1>
        @endif

    </div>
@endsection
