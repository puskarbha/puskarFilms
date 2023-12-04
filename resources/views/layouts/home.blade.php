<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planet</title>
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link href='{{asset("home/css/bootstrap.min.css")}}' rel="stylesheet">
    <link href='{{asset("home/css/font-awesome.min.css")}}' rel="stylesheet">
    <link href='{{asset("home/css/global.css")}}' rel="stylesheet">
    <link href='{{asset("home/css/index.css")}}' rel="stylesheet">
    <link href='{{asset("https://fonts.googleapis.com/css2?family=Rajdhani&display=swap")}}' rel="stylesheet">
    <script src='{{asset("home/js/bootstrap.bundle.min.js")}}'></script>

</head>

<body>
@include('home.partials.topHeader')
@include('home.partials.header')
@if(session()->has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@yield('homeContent')

@include('home.partials.footer')


<script>
    window.onscroll = function () { myFunction() };

    var navbar_sticky = document.getElementById("navbar_sticky");
    var sticky = navbar_sticky.offsetTop;
    var navbar_height = document.querySelector('.navbar').offsetHeight;

    function myFunction() {
        if (window.pageYOffset >= sticky + navbar_height) {
            navbar_sticky.classList.add("sticky")
            document.body.style.paddingTop = navbar_height + 'px';
        } else {
            navbar_sticky.classList.remove("sticky");
            document.body.style.paddingTop = '0'
        }
    }
</script>


<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
