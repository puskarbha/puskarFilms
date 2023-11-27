@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form container mt-4">
        <form method="POST" action="{{ route('show_times.store') }}" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center mb-4">Schedule Details</h2>

            <div class="mb-3">
                <img id="movie_thumbnail" src="#" alt="image not found" hidden>
                <label for="movieName" class="form-label">Movie Name</label>
                <div class="input-group">
                    <select name="movie_id" id="movieName" class="form-select" required>
                        <option disabled selected>- Select Movie -</option>
                        @foreach($movies as $movie)
                            <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                        @endforeach
                    </select>
                    <label class="input-group-text" for="movieName">
                        <i class="fas fa-film"></i>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number"  class="form-control" id="duration" name="duration" required>
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" value="12:00" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


@endsection
