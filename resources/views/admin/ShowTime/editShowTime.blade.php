@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form container ">
        <form method="POST" action="{{route('show_times.update',$showTime->id) }}">
            @csrf
            @method('PUT')
            <h2 class="text-center p-3">Schedule Details</h2>
            <div class="mb-3">
                {{$errors}}
                <img id="movie_thumbnail" src="#" alt="image not found" hidden>
                <label for="movieName" class="form-label">Movie Name</label>
                <div class="input-group">
                    <select name="movie_id" id="movieName" class="form-select" required>

                        @foreach($movies as $movie)
                            @if($movie->id==$showTime->movie_id)
                                <option value="{{ $movie->id }}" selected>{{ $movie->name }}</option>
                            @else
                                <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <label class="input-group-text" for="movieName">
                        <i class="fas fa-film"></i>
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (in minutes)</label>
                <input type="number"  class="form-control" id="duration" name="duration" required value="{{$showTime->duration}}">
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required value="{{$showTime->time}}">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" required value="{{$showTime->status}}">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
