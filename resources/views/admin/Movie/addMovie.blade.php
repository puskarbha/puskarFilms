@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form ml-3 mr-3">
        <form method="POST" action="{{route('movies.store')}}" enctype="multipart/form-data">
            @csrf
            <h2 class="mt-2">Movie Details</h2>
            <div class="mb-3">
                <label for="movieName" class="form-label">movie Name</label>
                <input type="text"  class="form-control" id="movieName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="cast" class="form-label">Cast</label>
                <input type="text" class="form-control" id="cast" name="cast" required>
            </div>

            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" name='director' class="form-control" id="director"  required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" aria-describedby="emailHelp" name="genre" required>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Language</label>
                <input type="text" class="form-control" id="language" aria-describedby="emailHelp" name="language" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea  class="form-control" id="description" name="description" rows="4" cols="50"></textarea>

            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number"  class="form-control" id="duration" name="duration" required>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                <br><button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
{{$errors}}
    </div>
@endsection
