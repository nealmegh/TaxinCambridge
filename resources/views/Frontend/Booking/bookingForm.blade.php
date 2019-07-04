@extends('Frontend.layout')

@section('css')
    <link href="{{asset("js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css")}}" rel="stylesheet">
@append

@section('content')

    <!--================ Booking section start =================-->


@endsection

@section('js')
    <script src="{{asset("js/moment.min.js")}}"></script>
    <script src="{{asset("js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")}}"></script>

<script>
    $('#policy').on('click', function() {
        if(document.getElementById('bookingButton').disabled){

            $("#bookingButton").prop('disabled', false);
            // $("#bookingButton2").prop('disabled', false);
        }
        else {
            $("#bookingButton").prop('disabled', true);
            // $("#bookingButton2").prop('disabled', true);
        }
    });
</script>
    <script>
    // $('#return').on('change', function() {
    //     // var e = document.getElementById("return");
    //     // var returnType = e.options[e.selectedIndex].value;
    //     // if(returnType == 1)
    //     // {
    //     //
    //     // }
    //     document.getElementById("return_date").enabled = (this.value === 1);
    // });
    // document.getElementById('return').onchange = function () {
    //     document.getElementById("return_date").disabled = (this.value === '0');
    //     var x = document.getElementById("rDate");
    //     if (x.style.display === "none") {
    //         x.style.display = "block";
    //     } else {
    //         x.style.display = "none";
    //     }
    //     document.getElementById("return_time").disabled = (this.value === '0');
    // }

    $('#car_type').on('change', function() {

        var e = document.getElementById("car_type");
        var car_type = e.options[e.selectedIndex].value;
        var cars = {!! json_encode($cars) !!};
        var price = {!! json_encode($price) !!};
        var returnPrice = {!! json_encode($returnPrice) !!};
        var carPrice = parseFloat(0);
        var meetValue = {!! json_encode($siteSettings[0]->value) !!}
            meetValue = parseFloat(meetValue);

        var f = document.getElementById("return");
        var returnType = f.options[f.selectedIndex].value;
        var tp = parseFloat(0);
        var meetPrice = parseFloat(0);
        for(var i=0; i<cars.length; i++)
        {
            if (car_type == cars[i].id) {
                carPrice = parseFloat(cars[i].fair);
            }

        }
        if(returnType != 1)
        {
            returnPrice = 0;
        }
        else
        {
            carPrice = carPrice+carPrice;
        }
        var g = document.getElementById("meet");

        var meet = g.options[g.selectedIndex].value;

        if(meet == 1)
                {
                    meetPrice = parseFloat(meetValue);
                }
console.log(price, returnPrice, carPrice, meetPrice)
        tp = price + returnPrice + carPrice + meetPrice;
                $("#hiddenPrice").val(function() {
                    tp = tp.toFixed(2)
                    return tp;
                });
                $("#hiddenCarPrice").val(function() {
                    carPrice = carPrice.toFixed(2)
                    return carPrice;
                });
                var button = document.getElementById('bookingButton');

                button.innerHTML = 'Book Now with Total Fair £'+  tp;

    });
    $('#meet').on('change', function() {

        var e = document.getElementById("meet");
        var meet = e.options[e.selectedIndex].value;
        var meetValue = {!! json_encode($siteSettings[0]->value) !!}
            meetValue = parseFloat(meetValue);

        if(meet == 1)
        {
            var hiddenPrice = document.getElementById('hiddenPrice');
            // console.log(hiddenPrice);
            var tp = parseFloat(hiddenPrice.value) + meetValue;
            $("#hiddenPrice").val(function() {
                tp = tp.toFixed(2)
                return tp;
            });
            var button = document.getElementById('bookingButton');

            button.innerHTML = 'Book Now with Total Fair £'+  tp;
        }
        else
        {
            var hiddenPrice = document.getElementById('hiddenPrice');
            // console.log(hiddenPrice);
            var tp = parseFloat(hiddenPrice.value) - meetValue;
            $("#hiddenPrice").val(function() {
                tp = tp.toFixed(2)
                return tp;
            });
            var button = document.getElementById('bookingButton');

            button.innerHTML = 'Book Now with Total Fair £'+  tp;
        }

    });
    $('#return').on('change', function() {

        {{--var e = document.getElementById("return");--}}
        {{--var returnType = e.options[e.selectedIndex].value;--}}
        {{--var f = document.getElementById("hiddenCarPrice");--}}
        {{--console.log(e,f);--}}
        {{--var carType = f.value;--}}

        {{--var maintain = {!! json_encode($maintain) !!};--}}
        {{--var returnPrice = {!! json_encode($returnPrice) !!};--}}
        {{--var e = document.getElementById("car_type");--}}
        {{--var car_type = e.options[e.selectedIndex].value;--}}
        {{--var cars = {!! json_encode($cars) !!};--}}

        {{--if(returnType == 1)--}}
        {{--{--}}


                {{--// var hiddenPrice = document.getElementById('hiddenPrice');--}}
                {{--var tp = parseInt(hiddenPrice.value)+parseInt(returnPrice);--}}
                {{--tp = tp + parseInt(carType);--}}


            {{--// console.log(hiddenPrice);--}}

            {{--$("#hiddenPrice").val(function() {--}}
                {{--return tp;--}}
            {{--});--}}

            {{--var button = document.getElementById('bookingButton');--}}

            {{--button.innerHTML = 'Book Now with Total Fair £'+  tp;--}}
        {{--}--}}
        {{--else--}}
        {{--{--}}
            {{--var hiddenPrice = document.getElementById('hiddenPrice');--}}

            {{--var tp = parseInt(hiddenPrice.value) - parseInt(returnPrice);--}}
            {{--tp = tp - parseInt(carType);--}}

            {{--$("#hiddenPrice").val(function() {--}}
                {{--return tp;--}}
            {{--});--}}
            {{--var button = document.getElementById('bookingButton');--}}

            {{--button.innerHTML = 'Book Now with Total Fair £'+  tp;--}}
        {{--}--}}

        document.getElementById("return_date").disabled = (this.value === '0');
        var x = document.getElementById("rDate");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        document.getElementById("return_time").disabled = (this.value === '0');
        var e = document.getElementById("car_type");
        var car_type = e.options[e.selectedIndex].value;
        var cars = {!! json_encode($cars) !!};
        var price = {!! json_encode($price) !!};
        price = price.toFixed(2);
        // alert(price);
        var returnPrice = {!! json_encode($returnPrice) !!};
        returnPrice = returnPrice.toFixed(2);
        var meetValue = {!! json_encode($siteSettings[0]->value) !!};
        meetValue = parseFloat(meetValue);
        var carPrice = parseFloat(0);

        var f = document.getElementById("return");
        var returnType = f.options[f.selectedIndex].value;
        var tp = parseFloat(0);
        var meetPrice = parseFloat(0);
        for(var i=0; i<cars.length; i++)
        {
            if (car_type == cars[i].id) {
                carPrice = parseFloat(cars[i].fair);
            }

        }
        // alert(carPrice);
        if(returnType != 1)
        {
            returnPrice = 0;
        }
        else
        {
            carPrice = carPrice+carPrice;
        }
        // alert(returnPrice);
        var g = document.getElementById("meet");

        var meet = g.options[g.selectedIndex].value;

        if(meet == 1)
        {

            meetPrice = parseFloat(meetValue);
        }
        // alert(meetPrice);
        console.log(price, returnPrice, carPrice, meetPrice);
        tp = Number(price) + Number(returnPrice) + Number(carPrice)  + Number(meetPrice);
        console.log(tp);
        tp = parseFloat(tp);
        $("#hiddenPrice").val(function() {
            tp = tp.toFixed(2);
            return tp;
        });
        $("#hiddenCarPrice").val(function() {
            carPrice = carPrice.toFixed(2);
            return carPrice;
        });

        var button = document.getElementById('bookingButton');

        button.innerHTML = 'Book Now with Total Fair £'+  tp;
console.log(price+returnPrice);
    });

    $('#pickup_time').datetimepicker({
        format: 'HH:mm'
    });
    $('#return_time').datetimepicker({
        format: 'HH:mm'
    });
</script>
@append