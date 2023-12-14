{{--upcoming--}}
<section id="upcome" class="pt-4 pb-5">
    <div class="container">
        <div class="row trend_1">
            <div class="col-md-6 col-6">
                <div class="trend_1l">
                    <h4 class="mb-0"><i class="fa fa-youtube-play align-middle col_red me-1"></i> Upcoming <span
                            class="col_red">Movies</span></h4>
                </div>
            </div>
            <div class="col-md-6 col-6">
                <div class="trend_1r text-end">
                    <h6 class="mb-0"><a class="button" href="{{route('upcomingMovies')}}"> View All</a></h6>
                </div>
            </div>
        </div>
        <div class="row trend_2 mt-4">
            <div id="carouselExampleCaptions2" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="0"
                            class="active" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide-to="1"
                            aria-label="Slide 2" class="" aria-current="true"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="trend_2i row">
                            @foreach($comingMovies as $comingMovie)
                            <div class="col-md-4">
                                <div class="trend_2im clearfix position-relative">
                                    <div class="trend_2im1 clearfix">
                                        <div class="grid">
                                            <figure class="effect-jazz mb-0">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset('images/Movies') }}/{{ $comingMovie->movie->thumbnail }}"
                                                        class="w-100" alt="img25" style="height: 360px; width: 240px"></a>
                                            </figure>
                                        </div>
                                    </div>

                                </div>
                                <div class="trend_2ilast bg_grey p-3 clearfix">
                                    <h5><a class="col_red" href="#">{{ $comingMovie->movie->name }}</a></h5>
                                    <p class="mb-2">A father travels from Oklahoma to France to help his...</p>
                                    <span class="col_red">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    <p class="mb-0">1 Views</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="trend_2i row">
                            @foreach($comingMovies as $comingMovie)
                            <div class="col-md-4">
                                <div class="trend_2im clearfix position-relative">
                                    <div class="trend_2im1 clearfix">
                                        <div class="grid">
                                            <figure class="effect-jazz mb-0">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset('images/Movies') }}/{{ $comingMovie->movie->thumbnail }}"
                                                         class="w-100" alt="img25" style="height: 360px; width: 240px"></a>
                                            </figure>
                                        </div>
                                    </div>

                                </div>
                                <div class="trend_2ilast bg_grey p-3 clearfix">
                                    <h5><a class="col_red" href="#">{{ $comingMovie->movie->name }}</a></h5>
                                    <p class="mb-2">A father travels from Oklahoma to France to help his...</p>
                                    <span class="col_red">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    <p class="mb-0">1 Views</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
