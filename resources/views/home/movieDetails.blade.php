@extends('layouts.home')
@section('homeContent')
    <style>
        .movie--details {
            display: flex;
            flex-direction: row;
            background-color: #b3c4c2;
            border-radius: 15px;

        }

        .movie-thumbnail img {
            max-height: 300px;
            max-width: 300px;
            border-radius: 15px;
        }

        .movie--hall {
            background-color: #5a6268;
            border-radius: 15px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>

    <div class="container  mx-auto">
        <div class="movie--details">
            <div class="movie-thumbnail m-3">
                <img
                    src="{{ asset('images/Movies') }}/{{ $movie->thumbnail }}"
                    alt="..."
                >
            </div>
            <div class="movie--header ">
                <h3>{{$movie->name}}</h3>
                <p>{{$movie->genre}}</p>
                <p>{{$movie->cast}}</p>
            </div>
        </div>

        <div class="col-24 col-sm-15 col-lg-35 text-black">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item w-25">
                            <a class="nav-link active" id="custom-tabs-three-day1-tab" data-toggle="pill"
                               href="#custom-tabs-three-day1" role="tab" aria-controls="custom-tabs-three-day1"
                               aria-selected="true">
                                <span id="nepali_day0">

                                </span> (Today)
                            </a>
                        </li>
                        <li class="nav-item w-25">
                            <a class="nav-link" id="custom-tabs-three-day2-tab" data-toggle="pill"
                               href="#custom-tabs-three-day2" role="tab" aria-controls="custom-tabs-three-day2"
                               aria-selected="false">
                             <span id="nepali_day1">

                                </span>
                            </a>
                        </li>
                        <li class="nav-item w-25">
                            <a class="nav-link" id="custom-tabs-three-day3-tab" data-toggle="pill"
                               href="#custom-tabs-three-day3" role="tab" aria-controls="custom-tabs-three-day3"
                               aria-selected="false">
                              <span id="nepali_day2">

                                </span>
                            </a>
                        </li>
                        <li class="nav-item w-25">
                            <a class="nav-link" id="custom-tabs-three-day4-tab" data-toggle="pill"
                               href="#custom-tabs-three-day4" role="tab" aria-controls="custom-tabs-three-day4"
                               aria-selected="false">
                               <span id="nepali_day3">

                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        {{--                        day 0--}}
                        <div class="tab-pane fade show active" id="custom-tabs-three-day1" role="tabpanel"
                             aria-labelledby="custom-tabs-three-day1-tab">
                            {{--                         day 0  content starts--}}

                            <div class="row">
                                @foreach($branches as $branch)
                                    <div class="branch--showTime">
                                        <ul class="list-group list-group-flush text-black ">
                                            @php
                                                $hasShows = false;
                                            @endphp
                                            <div class="movie--hall  ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h2 class=" text-white">{{ $branch->name }}</h2>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row d-flex ">
                                                            @foreach($movieDay0 as $show)
                                                                <div class="showTime--list">
                                                                    @if($show->hall->branch->id == $branch->id)
                                                                        @php
                                                                            $hasShows = true;
                                                                        @endphp
                                                                        <li class="list-group-item text-black movie--hall">
                                                                            <a
                                                                                class="btn btn-primary "
                                                                                href="{{route('hall_seats',$show->id)}}">

                                                                                {{ $show->time }}
                                                                                <h6 style="font-size:12px;">Hall
                                                                                    : {{$show->hall->hall_name}}</h6>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>


                                                @if(!$hasShows)
                                                    <li class="list-group-item  movie--hall text-center text-white">No
                                                        shows available at the branch
                                                    </li>
                                                @endif
                                            </div>

                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            {{--                         Day 0  content ends--}}

                        </div>

                        {{--                        Day 0 ends--}}

                        {{--                        Day 1 start--}}


                        <div class="tab-pane fade" id="custom-tabs-three-day2" role="tabpanel"
                             aria-labelledby="custom-tabs-three-day2-tab">

                            <div class="row">
                                @foreach($branches as $branch)
                                    <div class="branch--showTime">
                                        <ul class="list-group list-group-flush text-black ">
                                            @php
                                                $hasShows = false;
                                            @endphp
                                            <div class="movie--hall  ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h2 class=" text-white">{{ $branch->name }}</h2>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row d-flex ">
                                                            @foreach($movieDay1 as $show)
                                                                <div class="showTime--list">
                                                                    @if($show->hall->branch->id == $branch->id)
                                                                        @php
                                                                            $hasShows = true;
                                                                        @endphp
                                                                        <li class="list-group-item text-black movie--hall">
                                                                            <a
                                                                                class="btn btn-primary "
                                                                                href="{{route('hall_seats',$show->id)}}">

                                                                                {{ $show->time }}
                                                                                <h6 style="font-size:12px;">Hall
                                                                                    : {{$show->hall->hall_name}}</h6>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>


                                                @if(!$hasShows)
                                                    <li class="list-group-item  movie--hall text-center text-white">No
                                                        shows available at the branch
                                                    </li>
                                                @endif
                                            </div>

                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                        day 1 ends--}}
                        {{--                        day 2 start--}}
                        <div class="tab-pane fade text-black" id="custom-tabs-three-day3" role="tabpanel"
                             aria-labelledby="custom-tabs-three-day3-tab">

                            <div class="row">
                                @foreach($branches as $branch)
                                    <div class="branch--showTime">
                                        <ul class="list-group list-group-flush text-black ">
                                            @php
                                                $hasShows = false;
                                            @endphp
                                            <div class="movie--hall  ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h2 class=" text-white">{{ $branch->name }}</h2>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row d-flex ">
                                                            @foreach($movieDay2 as $show)
                                                                <div class="showTime--list">
                                                                    @if($show->hall->branch->id == $branch->id)
                                                                        @php
                                                                            $hasShows = true;
                                                                        @endphp
                                                                        <li class="list-group-item text-black movie--hall">
                                                                            <a
                                                                                class="btn btn-primary "
                                                                                href="{{route('hall_seats',$show->id)}}">

                                                                                {{ $show->time }}
                                                                                <h6 style="font-size:12px;">Hall
                                                                                    : {{$show->hall->hall_name}}</h6>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>


                                                @if(!$hasShows)
                                                    <li class="list-group-item  movie--hall text-center text-white">No
                                                        shows available at the branch
                                                    </li>
                                                @endif
                                            </div>

                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                        day 2 ends--}}

                        {{--                        day 3 start--}}
                        <div class="tab-pane fade" id="custom-tabs-three-day4" role="tabpanel"
                             aria-labelledby="custom-tabs-three-day4-tab">

                            <div class="row">
                                @foreach($branches as $branch)
                                    <div class="branch--showTime">
                                        <ul class="list-group list-group-flush text-black ">
                                            @php
                                                $hasShows = false;
                                            @endphp
                                            <div class="movie--hall  ">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h2 class=" text-white">{{ $branch->name }}</h2>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row d-flex ">
                                                            @foreach($movieDay3 as $show)
                                                                <div class="showTime--list">
                                                                    @if($show->hall->branch->id == $branch->id)
                                                                        @php
                                                                            $hasShows = true;
                                                                        @endphp
                                                                        <li class="list-group-item text-black movie--hall">
                                                                            <a
                                                                                class="btn btn-primary "
                                                                                href="{{route('hall_seats',$show->id)}}">

                                                                                {{ $show->time }}
                                                                                <h6 style="font-size:12px;">Hall
                                                                                    : {{$show->hall->hall_name}}</h6>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>


                                                @if(!$hasShows)
                                                    <li class="list-group-item  movie--hall text-center text-white">No
                                                        shows available at the branch
                                                    </li>
                                                @endif
                                            </div>

                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                        day 3 ends--}}

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <script>



        document.getElementById('nepali_day0').innerText =
            NepaliFunctions.GetCurrentBsDay()+"-"+NepaliFunctions.GetBsMonth(NepaliFunctions.GetCurrentBsMonth());


        document.getElementById('nepali_day1').innerText =
        NepaliFunctions.BsAddDays(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'), 1, 'YYYY-MM-DD');

        document.getElementById('nepali_day2').innerText =
            NepaliFunctions.BsAddDays(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'), 2, 'YYYY-MM-DD');

        document.getElementById('nepali_day3').innerText =
            NepaliFunctions.BsAddDays(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'), 3, 'YYYY-MM-DD')
        // document.getElementById('nepali_day1').innerText =
        //     NepaliFunctions.GetCurrentBsDay()+1+"-"+NepaliFunctions.GetBsMonth(NepaliFunctions.GetCurrentBsMonth());
        // document.getElementById('nepali_day2').innerText =
        //     NepaliFunctions.GetCurrentBsDay()+2+"-"+NepaliFunctions.GetBsMonth(NepaliFunctions.GetCurrentBsMonth());
        // document.getElementById('nepali_day3').innerText =
        //     NepaliFunctions.GetCurrentBsDay()+3+"-"+NepaliFunctions.GetBsMonth(NepaliFunctions.GetCurrentBsMonth());
    </script>
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection
