<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Planet</title>
    <link href='{{asset("home/css/bootstrap.min.css")}}' rel="stylesheet">
    <link href='{{asset("home/css/font-awesome.min.css")}}' rel="stylesheet">
    <link href='{{asset("home/css/global.css")}}' rel="stylesheet">
    <link href='{{asset("home/css/index.css")}}' rel="stylesheet">
    <link href='{{asset("https://fonts.googleapis.com/css2?family=Rajdhani&display=swap")}}' rel="stylesheet">
    <script src='{{asset("home/js/bootstrap.bundle.min.js")}}'></script>

</head>

<body>
@include('home.partials.topHeader')
<div class="container-fluid">

</div>

@yield('authContent')




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

</body>

</html>
