<!DOCTYPE html>
<html lang="en">
<head>
    @include('Frontend.Associate.head')
    @yield('css')
</head>
<body>
<!--================Header Menu Area =================-->
@include('Frontend.Associate.header')
<!--================Header Menu Area =================-->


<main class="side-main">
   @yield('content')

    @include('Frontend.Associate.features')

</main>


<!-- ================ Start footer Area ================= -->
@include('Frontend.Associate.footer')
<!-- ================ End footer Area ================= -->

{{--<script src="vendors/jquery/jquery-3.2.1.min.js"></script>--}}
{{--<script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>--}}
{{--<script src="vendors/owl-carousel/owl.carousel.min.js"></script>--}}
{{--<script src="js/jquery.ajaxchimp.min.js"></script>--}}
{{--<script src="js/mail-script.js"></script>--}}
{{--<script src="js/main.js"></script>--}}
<script src="{{asset("js/Frontend/jquery/jquery-3.2.1.min.js")}}" ></script>
<script src="{{asset("js/Frontend/bootstrap/bootstrap.bundle.min.js")}}" ></script>
<script src="{{asset("js/Frontend/owl-carousel/owl.carousel.min.js")}}" ></script>
{{--<script src="{{asset("js/Frontend/js/jquery.ajaxchimp.min.js")}}" ></script>--}}
{{--<script src="{{asset("js/Frontend/js/mail-script.js")}}" ></script>--}}
{{--<script src="{{asset("js/Frontend/js/main.js")}}" ></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



@yield('js')
</body>
</html>