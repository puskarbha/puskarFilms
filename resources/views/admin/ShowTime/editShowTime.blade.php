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
                    <select name="movie_id" id="movieName" class="form-select" required >

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
                        <select name="branch_id" id="branchName" class="form-select" required onchange="hallSetup()">
                            <option disabled selected>- Select branch -</option>
                            @foreach($branches as $branch)
                                @if($branch->id==$showTime->hall->branch->id)
                                    <option value="{{ $branch->id }}" selected>{{ $branch->name }}</option>
                                @else
                                       <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3" id="hall_list">
                    <div class="input-group">
                        <label for="hallName" class="form-label">Select Hall:  </label>

                        <select name="hall_id" class="form-select mx-3" id="hallName">
                        @foreach($showTime->hall->branch->halls as $hall)
                            @if($hall->id == $showTime->hall_id)
                                    <option value="{{$hall->id}}" selected>{{$hall->hall_name}}</option>
                                @else
                                    <option value="{{$hall->id}}" >{{$hall->hall_name}}</option>

                            @endif

                        @endforeach
                        </select>
                    </div>
                </div>
            <div class="mb-3">
                <label for="date" class="form-label">date</label>
                <input type="text" class="form-control date_bs"  name="date_bs" required value="{{$showTime->date_bs}}">
                <input type="date" class="form-control date_ad"  name="date_ad" required value="{{$showTime->date_ad}}">

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


    <script>
        window.onload = function() {
            var mainInput = document.querySelector(".date_bs");
            mainInput.nepaliDatePicker();
        };
        function BSTOAD(){
            var nepaliDate=document.querySelector('.date_bs').value;
            var adDate=NepaliFunctions.BS2AD(nepaliDate);
            document.querySelector('.date_ad').value=adDate;
        }
        setInterval(() => {
            BSTOAD();
        }, 30);
        function hallSetup() {
            var branchId = document.getElementById('branchName').value;
            var hallSelect = document.getElementById('hallName');

            // Remove existing options
            hallSelect.innerHTML = '<option disabled selected>- Select Hall -</option>';

            // Add new options based on the selected branch
            @foreach($branches as $branch)
            if ("{{ $branch->id }}" === branchId) {
                @foreach($branch->halls as $hall)
                var option = document.createElement("option");
                option.value = "{{ $hall->id }}";
                option.text = "{{ $hall->hall_name }}";

                hallSelect.add(option);
                @endforeach
            }
            @endforeach
        }
    </script>
@endsection
