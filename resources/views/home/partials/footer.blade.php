<section id="footer">
    <div class="footer_m clearfix">
        <div class="container">
            <div class="row footer_1">
                <div class="col-md-4">
                    <div class="footer_1i">
                        <h3><a class="text-white" href="index.html"><i class="fa fa-video-camera col_red me-1"></i>
                                P-Films</a></h3>
                        <p class="mt-3">"Where Dreams Unfold on the Silver Screen: Your Gateway to Cinematic Wonders!" </p>
                        <h6 class="fw-normal"><i class="fa fa-map-marker fs-5 align-middle col_red me-1"></i>
                           Shantinagear,kathmandu
                            Nepal</h6>
                        <h6 class="fw-normal mt-3"><i class="fa fa-envelope fs-5 align-middle col_red me-1"></i>
                            info.pfilms@gmail.com</h6>
                        <h6 class="fw-normal mt-3 mb-0"><i class="fa fa-phone fs-5 align-middle col_red me-1"></i>
                            9867445665</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_1i">
                        <h4>Our  <span class="col_red">Branches</span></h4>
                        <div class="footer_1i1 row mt-4">
                            @foreach($branches as $branch)
                            <div class="col-md-3 col-3">
                                <div class="footer_1i1i">
                                    <div class="grid clearfix">

                                            <a href="#">{{$branch->name}}</a>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_1i">
                        <h4>Sign <span class="col_red">Newsletter</span></h4>
                        <p class="mt-3">Subscribe to our newsletter list to get latest news and updates from us</p>
                        <div class="input-group">
                            <input type="text" class="form-control bg-black" placeholder="Email">
                            <span class="input-group-btn">
                                    <button class="btn btn text-white bg_red rounded-0 border-0" type="button">
                                        Subscribe</button>
                                </span>
                        </div>
                        <ul class="social-network social-circle mb-0 mt-4">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="footer_b" class="pt-3 pb-3 bg_grey">
    <div class="container">
        <div class="row footer_1">
            <div class="col-md-8">
                <div class="footer_1l">
                    <p class="mb-0">© 2013 Puskar Films. All Rights Reserved . </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer_1r">
                    <ul class="mb-0">
                        <li class="d-inline-block me-2"><a href="#">Home</a></li>
                        <li class="d-inline-block me-2"><a href="#">Features</a></li>
                        <li class="d-inline-block me-2"><a href="#">Pages</a></li>
                        <li class="d-inline-block me-2"><a href="#">Portfolio</a></li>
                        <li class="d-inline-block me-2"><a href="#">Blog</a></li>
                        <li class="d-inline-block"><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
