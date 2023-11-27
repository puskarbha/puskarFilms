@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form ml-3 mr-3">
        <form method="POST" action="{{route('movies.update',$movie->id)}}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <h2 class="mt-2">Movie Details</h2>
            <div class="mb-3">
                <label for="movieName" class="form-label">movie Name</label>
                <input type="text"  class="form-control" id="movieName" name="name" required value="{{$movie->name}}">
            </div>
            <div class="mb-3">
                <label for="cast" class="form-label">Cast</label>
                <input type="text" class="form-control" id="cast" name="cast" required value="{{$movie->cast}}">
            </div>

            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" name='director' class="form-control" id="director"  required value="{{$movie->director}}">
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">language</label>
                <input type="text" class="form-control" id="language" aria-describedby="emailHelp" name="language" required value="{{$movie->language}}">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" aria-describedby="emailHelp" name="genre" required  value="{{$movie->genre}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea  class="form-control" id="description" name="description" rows="4" cols="50" >{{$movie->description}}</textarea>

            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <br>
                <img src="{{asset('images/Movies')}}/{{$movie->thumbnail}}" alt="" class="img-thumbnail" style="max-height: 200px;">
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" >
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div>
@endsection
