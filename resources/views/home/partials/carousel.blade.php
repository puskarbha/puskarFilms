<section id="center" class="center_home">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($nowShowings as $key => $nowShowing)

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="{{ $key === 1 ? 'active' : '' }}"
                    aria-label="Slide {{$key}}"></button>
            @endforeach
        </div>


        <div class="carousel-inner">
            @foreach($nowShowings as $key => $nowShowing)

            <div class="carousel-item {{ $key === 1 ? 'active' : '' }}">
                <img
                    src="{{ asset('images/Movies') }}/{{ $nowShowing->movie->thumbnail }}"
                    class="d-block w-100" alt="..." style="height: 800px ; width: 1600px">
                <div class="carousel-caption d-md-block">
                    <h1 class="font_60">{{$nowShowing->movie->name}}</h1>
                    <h6 class="mt-3">
                            <span class="col_red me-3">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                            </span>
                        4.5 (Imdb) Year : 2022
                        <a class="button" href="#"><i class="fa fa-play-circle align-middle me-1"></i>
                            </a>

                    </h6>
                    <p class="mt-3">{{$nowShowing->movie->description}}</p>
                    <p class="mb-2"><span class="col_red me-1 fw-bold">Starring:</span>
                        {{$nowShowing->movie->cast}}</p>
                    <p class="mb-2"><span class="col_red me-1 fw-bold">Genres:</span>
                        {{$nowShowing->movie->genre}}</p>
                    <p><span class="col_red me-1 fw-bold">{{__('Runtime')}}:</span> {{$nowShowing->duration}} min</p>
                    <h6 class="mt-4 text-center">
                        <a class="bg_red p-2 pe-4 ps-4 ms-3 text-white d-inline-block " href="{{route('home.movieDetails',$nowShowing->movie->id)}}">Book Your Seat Now</a>
                    </h6>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</section>
