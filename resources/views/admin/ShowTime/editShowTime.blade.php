@extends('layouts.admin')
@section('adminContent')

    <div class="addBranch--form container ">
        <form method="POST" action="{{route('show_times.update',$showTime->id) }}">
            @csrf
            @method('PUT')
            <h2 class="text-center p-3">Schedule Details</h2>
            <div class="mb-3">

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

                <div class="mb-3">
                    <label for="branchName" class="form-label">branch Name</label>
                    <div class="input-group">
                        <select name="branch_id" id="branchName" class="form-select" required>
                            <option disabled selected>- Select branch -</option>
                            @foreach($branches as $branch)
                                @if($branch->id==$showTime->branch_id)
                                    <option value="{{ $branch->id }}" selected>{{ $branch->name }}</option>
                                @else
                                       <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endif

                            @endforeach
                        </select>
                        <label class="input-group-text" for="branchName">
                            <i class="fas fa-film"></i>
                        </label>
                    </div>
                </div>
            <div class="mb-3">
                <label for="date" class="form-label">date</label>
                <input type="date" class="form-control" id="date" name="date" required value="{{$showTime->date}}">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required value="{{$showTime->time}}">
            </div>

            <div class="mb-3">
                <label for="#">Status</label>
                <div class="form-check-container pl-3">
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="status" id="showingNow" value="Showing_now" {{ $showTime->status == 'Showing_now' ? 'checked' : '' }} >
                        <label class="form-check-label" for="showingNow">
                            Showing Now
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="comingSoon" value="Coming_soon" {{ $showTime->status == 'Coming_soon' ? 'checked' : '' }}>
                        <label class="form-check-label" for="comingSoon">
                            Coming Soon
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="out" value="out" {{ $showTime->status == 'out' ? 'checked' : '' }}>
                        <label class="form-check-label" for="out">
                            Out
                        </label>
                    </div>
                </div>

            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
