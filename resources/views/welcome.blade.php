{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
    {{--<head>--}}
        {{--<meta charset="utf-8">--}}
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

        {{--<title>Laravel</title>--}}

        {{--<!-- Fonts -->--}}
        {{--<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">--}}

        {{--<!-- Styles -->--}}
        {{--<style>--}}
            {{--html, body {--}}
                {{--background-color: #fff;--}}
                {{--color: #636b6f;--}}
                {{--font-family: 'Nunito', sans-serif;--}}
                {{--font-weight: 200;--}}
                {{--height: 100vh;--}}
                {{--margin: 0;--}}
            {{--}--}}

            {{--.full-height {--}}
                {{--height: 100vh;--}}
            {{--}--}}

            {{--.flex-center {--}}
                {{--align-items: center;--}}
                {{--display: flex;--}}
                {{--justify-content: center;--}}
            {{--}--}}

            {{--.position-ref {--}}
                {{--position: relative;--}}
            {{--}--}}

            {{--.top-right {--}}
                {{--position: absolute;--}}
                {{--right: 10px;--}}
                {{--top: 18px;--}}
            {{--}--}}

            {{--.content {--}}
                {{--text-align: center;--}}
            {{--}--}}

            {{--.title {--}}
                {{--font-size: 84px;--}}
            {{--}--}}

            {{--.links > a {--}}
                {{--color: #636b6f;--}}
                {{--padding: 0 25px;--}}
                {{--font-size: 13px;--}}
                {{--font-weight: 600;--}}
                {{--letter-spacing: .1rem;--}}
                {{--text-decoration: none;--}}
                {{--text-transform: uppercase;--}}
            {{--}--}}

            {{--.m-b-md {--}}
                {{--margin-bottom: 30px;--}}
            {{--}--}}
        {{--</style>--}}
    {{--</head>--}}
    {{--<body>--}}
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@auth--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ route('login') }}">Login</a>--}}

                        {{--@if (Route::has('register'))--}}
                            {{--<a href="{{ route('register') }}">Register</a>--}}
                        {{--@endif--}}
                    {{--@endauth--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--<div class="content">--}}
                {{--<div class="title m-b-md">--}}
                    {{--Laravel--}}
                {{--</div>--}}

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Docs</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://blog.laravel.com">Blog</a>--}}
                    {{--<a href="https://nova.laravel.com">Nova</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</body>--}}
{{--</html>--}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Taxi in Cambridge - Home</title>
    {{--<link rel="icon" href="img/taxi.png" type="image/png">--}}
    <link rel="icon" href="{{asset("images/taxi.png")}}" type="image/png">
    <!-- Bootstrap -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset("css/font-awesome.min.css")}}" rel="stylesheet">

    {{--<link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">--}}
    {{--<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">--}}
    {{--<link rel="stylesheet" href="vendors/linericon/style.css">--}}
    <link href="{{asset("css/Frontend/linericon/style.css")}}" rel="stylesheet">
    <link href="{{asset("css/Frontend/themify-icons/themify-icons.css")}}" rel="stylesheet">
    <link href="{{asset("css/Frontend/owl-carousel/owl.theme.default.min.css")}}" rel="stylesheet">
    <link href="{{asset("css/Frontend/owl-carousel/owl.carousel.min.css")}}" rel="stylesheet">


    {{--<link rel="stylesheet" href="css/style.css">--}}
    <link href="{{asset("css/Frontend/style.css")}}" rel="stylesheet">
</head>
<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src="{{asset("images/logo.png")}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item active"><a class="nav-link" href="#"></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"></a>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"></a></li>
                    </ul>

                    <ul class="navbar-right">
                        <li class="nav-item">
                            <a href="#" style="color:white;"> <span class="fa-stack"><i class="fa fa-circle fa-stack-2x" style="color:blue;"></i><i class='fas fa-phone fa-flip-horizontal fa-stack-1x fa-inverse' style=''></i></span>(01223) 247 247</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->


<main class="side-main">
    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner mb-30px">
        <div class="container">
            <div class="row">
                <div class="hero-banner__content">
                    <h1>Stop waiting</h1>
                    <p>Stop waiting for something that may not be coming</p>
                    <p>Dial (01223) 247247 for Carot Cars, so you are not left waiting</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->


    <!--================ Booking section start =================-->
    <section class="booking-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3>Book a car online</h3>
                </div>
            </div>
            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('booking') }}">
                @csrf
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    {{--<input class="inputField" type="text" name="FirstName" placeholder="From">--}}
                    <div class="form-group">
                        <label for="selectFrom" class="control-label col-md-3 col-sm-3 col-xs-12">From</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select id="selectFrom" name="selectFrom" class="select2_group form-control">
                                <option value="placeholder" selected>Choose a Pick-Up Point</option>
                                <optgroup label="Airports">
                                    @foreach($airports as $airport)
                                    <option value="{{'air'.$airport->id}}">{{$airport->name}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Area">
                                    @foreach($locations as $location)
                                        <option value="{{'loc'.$location->id}}">{{$location->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="selectTo" class="control-label col-md-3 col-sm-3 col-xs-12">To</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select id="selectTo" name="selectTo" class="select2_group form-control">
                                <option selected>Choose a Drop-Off Point</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input id="hiddenTo" type="hidden" name="hiddenTo" value="0">
                <input id="hiddenFrom" type="hidden" name="hiddenFrom" value="0">
                <input id="hiddenPrice" type="hidden" name="hiddenPrice" value="0">
                <div class="col-md-4 col-sm-12">
                    <input id="bookButton" class="btn sudmitBtn shadow" type="submit" value="BOOK" disabled>
                </div>
            </div>
            </form>
        </div>
    </section>
    <!--================ Booking section end =================-->


    <!--================ Feature section start =================-->
    <section class="about-sect">
        <div class="container">
            <div class="row no-gutters align-items-center">
                <div class="col-md-7 mb-7 mb-md-0">
                    <div class="about-text-sect">
                        <h3> <img class="heading-images" src="{{asset("images/home/untitled-2.png")}}">Most Reliable Cambridge taxi for Airport Transfer</h3>
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>

                <div class="col-md-5 mb-5 mb-md-0">
                    <div class="offers">
                        <h2>Why book with us?</h2>
                        <div class="offer"><h3><span class="offer-num"><b>1</b></span>FREE Waiting Time Upto one hour</h3></div>
                        <div class="offer"><h3><span class="offer-num"><b>1</b></span>FREE Waiting Time Upto one hour</h3></div>
                        <div class="offer"><h3><span class="offer-num"><b>1</b></span>FREE Waiting Time Upto one hour</h3></div>
                        <div class="offer"><h3><span class="offer-num"><b>1</b></span>FREE Waiting Time Upto one hour</h3></div>
                        <div class="offer"><h3><span class="offer-num"><b>1</b></span>FREE Waiting Time Upto one hour</h3></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Feature section end =================-->

    <!--================ About section start =================-->
    <section class="about-sect-2">
        <div class="container">
            <div class="row no-gutters align-items-center">
                <h3> <img class="heading-images" src="{{asset("images/home/untitled-1.png")}}">Your best & comfy airport transfer taxi in CAMBRIDGE for competitive price.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </section>
    <!--================ About section end =================-->
</main>


<!-- ================ Start footer Area ================= -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="footer-1">
            <p>London Taxi and Privet Hire (LTPH) licence number 06294/02/03.</p>
            <p>@ 2009-2019 Ivory Enterprise Ltd.</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <h2 style="padding-top:60px;"><span style="font-size:28px;">Dial</span> <span style="font-size:40px; color: blue; font-weight: 600">0207 005 0557</span></h2>
            </div>
            <div class="col-md-4 offset-md-4">
                <img src="{{asset("images/untitled-3.png")}}">
            </div>

        </div>
    </div>

    </div>
</footer>
<!-- ================ End footer Area ================= -->

{{--<script src="vendors/jquery/jquery-3.2.1.min.js"></script>--}}
{{--<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>--}}
{{--<script src="vendors/owl-carousel/owl.carousel.min.js"></script>--}}
{{--<script src="js/jquery.ajaxchimp.min.js"></script>--}}
{{--<script src="js/mail-script.js"></script>--}}
{{--<script src="js/main.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">

    $('#selectFrom').on('change', function() {
        var e = document.getElementById("selectFrom");
        var selectValue = e.options[e.selectedIndex].value;
        var air = 'air';
        var check = selectValue.search(air);
        $("#hiddenFrom").val(function() {
            return selectValue;
        });
        if(check == 0)
        {
            // var select = document.getElementById("selectTo").empty();
            var select =

                $('#selectTo')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Choose a Drop-Off Point</option>')
            ;


            var locations = {!! json_encode($locations) !!};
            // console.log(airports[0].name);
            for(var i=0; i<locations.length; i++)
            {
                var option = document.createElement("option");
                option.text = locations[i].name;
                option.value = locations[i].id;
                var select = document.getElementById("selectTo");
                select.appendChild(option);

            }

        }
        else {
            var select =

                $('#selectTo')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">Choose a Drop-Off Point</option>')
            ;
            var airports = {!! json_encode($airports) !!};
            // console.log(airports[0].name);
            for(var i=0; i<airports.length; i++)
            {
                var option = document.createElement("option");
                option.text = airports[i].name;
                option.value = airports[i].id;
                var select = document.getElementById("selectTo");
                select.appendChild(option);

            }
        }
    });


</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#selectTo').on('change', function() {

        var e = document.getElementById("selectFrom");
        var selectFromValue = e.options[e.selectedIndex].value;
        var f = document.getElementById("selectTo");
        var selectToValue = f.options[f.selectedIndex].value;

        $("#hiddenTo").val(function() {
            return selectToValue;
        });



        $.ajax({
            type : "POST",
            url : 'getFair',
            data : {from: selectFromValue, to: selectToValue},
            success:function(data){
                $("#bookButton").prop('disabled', false);
                $("#bookButton").val(function() {
                    return 'Book with £ ' + data.msg;
                });
                $("#hiddenPrice").val(function() {
                    return data.msg;
                });
            },
            error:function(){

            }
        });

    });

</script>
</body>
</html>