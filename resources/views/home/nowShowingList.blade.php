@extends('layouts.home')
@section('homeContent')
    <div class="container row mx-4">

        <div class="trend_1l">
            <h4 class="mb-2"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Now <span
                    class="col_red">Showing</span></h4>
        </div>

        @foreach( $nowShowings as $nowShowing)


            <div class="card  position-relative m-3 p-0 border-3" style="width: 12rem;" >
                <img class="card-img-top h-75"
                     src="{{ asset('images/Movies') }}/{{ $nowShowing->movie->thumbnail }}"
                     alt="Card image cap"
                >
                <div class="card-body text-center " style="background-color: #30302d">
                    <div class="card-text">
                        <h4 class="col_red">{{ $nowShowing->movie->name}}</h4>
                        <h6 class="text-white m-0">Genre:{{ $nowShowing->movie->genre}}</h6>
                        <h6 class="text-white m-0">{{ $nowShowing->movie->description}}</h6>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
@endsection
