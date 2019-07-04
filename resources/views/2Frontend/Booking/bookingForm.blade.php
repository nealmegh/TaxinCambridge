@extends('2Frontend.layout')

@section('content')
    <div id="book"></div>
    <section class="booking-form">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 style="text-align: center;">Book your ride now!</h2>
        <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('front.booking.store').'#confirm' }}">
            @csrf
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 col-sm-12">
                        <label for="car_type">Car Type</label>
                        {{--{{dd($cars)}}--}}
                        <select id="car_type" name="car_id">
                            @foreach($cars as $car)
                                {{--@if(old('car_id') == $car->id) selected @endif--}}
                                @if($car->fair == 0)
                                    <option value="{{$car->id}}" selected>{{$car->name.' '.$car->description}}</option>
                                @else
                                    <option value="{{$car->id}}">{{$car->name.' '.$car->description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                @if($maintain == 'loc')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="from">From</label>
                            <input id="from" class="inputField" type="text" name="from" value="{{$locationM->display_name}}" disabled>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="to">To</label>
                            <input id="to" class="inputField" type="text" name="to" value="{{$airportN->display_name}}" disabled>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="from">From</label>
                            <input id="from" class="inputField" type="text" name="from" value="{{$airportN->display_name}}" disabled>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="to">To</label>
                            <input id="to" class="inputField" type="text" name="to" value="{{$locationM->display_name}}" disabled>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="journey-details-title">Journey Details</h4>
                        <div class="journey-details">
                            <div class="form-group-new">
                                <label for="pickup_address">Full Pickup Address (Post Code must be same with Selected Address) *</label>
                                <input id="pickup_address" class="inputField" type="text" name="pickup_address" placeholder="Specify Full Pickup Address" value="{{old('pickup_address')}}">
                            </div>
                            <div class="form-group-new">
                                <label for="dropoff_address">Full Drop off Address (Post Code must be same with Selected Address) *</label>
                                <input id="dropoff_address" class="inputField" type="text" name="dropoff_address" placeholder="Specify Full Drop off Address" value="{{old('dropoff_address')}}">
                            </div>
                            <div class="form-group-new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="journey_date">Pick Up Date/Time *</label>
                                        <input id="journey_date" class="inputField" type="date" name="journey_date" min="{{date_format(date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string("1 day")),'Y-m-d')}}" placeholder="Specify Pick Up Date" value="{{old('journey_date')}}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="pickup_time">Journey Time *</label>
                                        <input type="text" id="pickup_time" class="form-control" name="pickup_time" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="flight_number">Flight Number *</label>
                                        <input id="flight_number" class="inputField" type="text" name="flight_number" placeholder="Eg: BA001" value="{{old('flight_number')}}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="flight_origin">Flight/Train Origin *</label>
                                        <input id="flight_origin" class="form-control col-md-7 col-xs-12" name="flight_origin" placeholder="Eg: Milan" required="required" type="text" value="{{old('flight_origin')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-new">
                                <label for="return">Return Ride</label>
                                <select id="return" name="return">
                                    <option value="1" >Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                            </div>
                            <div class="form-group-new" id="rPA" style="display: none">
                                <label for="return_pickup_address">Full Return Pickup Address (Post Code must be same with Selected Address) *</label>
                                <input id="return_pickup_address" class="inputField" type="text" name="return_pickup_address" placeholder="Specify Full Pickup Address" value="{{old('return_pickup_address')}}" disabled>
                            </div>
                            <div class="form-group-new" id="rDA" style="display: none">
                                <label for="return_dropoff_address">Full Return Drop off Address (Post Code must be same with Selected Address) *</label>
                                <input id="return_dropoff_address" class="inputField" type="text" name="dropoff_address" placeholder="Specify Full Drop off Address" value="{{old('return_dropoff_address')}}" disabled>
                            </div>
                            <div class="form-group-new">
                                <div class="row" id="rDate" style="display: none">
                                    <div class="col-md-6">
                                        <label for="return_date">Return Date/Time *</label>
                                        <input id="return_date" class="inputField" type="date" name="return_date" placeholder="Specify Return Date" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label  for="return_time">Return Time *
                                        </label>
                                        {{--<div class='input-group date' id='return_time1'>--}}
                                        <input type='text' id="return_time" class="form-control" name="return_time" disabled>
                                        {{--<span class="input-group-addon">--}}
                                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                    </div>

                                    <div class="col-md-6">
                                        <label for="return_flight_number">Flight Number *</label>
                                        <input id="return_flight_number" class="inputField" type="text" name="return_flight_number" placeholder="Eg: BA001" value="{{old('return_flight_number')}}">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="return_flight_origin">Flight/Train Origin *</label>
                                        <input id="return_flight_origin" class="form-control col-md-7 col-xs-12" name="return_flight_origin" placeholder="Eg: Milan" required="required" type="text" value="{{old('return_flight_origin')}}">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="passenger-details-title">Passenger Details</h4>
                        <div class="passenger-details">
                            <div class="field-group-new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Adult *</label>
                                        <input class="" type="number" name="adult" min="1" max="10" value="{{old('adult')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Child *</label>
                                        <input class="" type="number" name="child" min="0" max="10" value="{{old('child')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Luggage *</label>
                                        <input class="" type="number" name="luggage" min="0" max="5" value="{{old('luggage')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Carryon *</label>
                                        <input class="" type="number" name="carryon" min="0" max="5" value="{{old('carryon')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="field-group-new">
                                <label for="email">Meet & Greet (£{{$siteSettings[0]->value}})</label>
                                <select id="meet" name="meet">
                                    <option value=1>Yes</option>
                                    <option value=0 selected>No</option>
                                </select>
                            </div>
                            <div class="field-group-new">
                                <label for="booking_details">Additional Instruction (if any)</label>
                                <textarea id="booking_details" class="inputField" name="add_info" placeholder="Ex: Come after 40 min flight lands"></textarea>

                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="pickup_address">Full Pickup Address (Post Code must be same with Selected Address)</label>--}}
                {{--<input id="pickup_address" class="inputField" type="text" name="pickup_address" placeholder="Specify Full Pickup Address" value="{{old('pickup_address')}}">--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="dropoff_address">Full Drop off Address (Post Code must be same with Selected Address)</label>--}}
                {{--<input id="dropoff_address" class="inputField" type="text" name="dropoff_address" placeholder="Specify Full Drop off Address" value="{{old('dropoff_address')}}">--}}
                {{--</div>--}}
                {{--</div>--}}


                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="journey_date">Pick Up Date/Time</label>--}}
                {{--<input id="journey_date" class="inputField" type="date" name="journey_date" min="{{date_format(date_add(date_create(date('Y-m-d')), date_interval_create_from_date_string("1 day")),'Y-m-d')}}" placeholder="Specify Pick Up Date" value="{{old('journey_date')}}">--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="pickup_time">Journey Time</label>--}}

                {{--<input id="journey_date" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="journey_date" placeholder="Journey Date" required="required" type="date">--}}


                {{--try--}}
                {{--<div class='input-group date' id='pickup_time1'>--}}
                {{--<input type='text' id="pickup_time" class="form-control" name="pickup_time" value="{{old('pickup_time')}}">--}}
                {{--<span class="input-group-addon">--}}
                {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--Try--}}


                {{--</div>--}}

                {{--</div>--}}

                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="flight_number">Passenger Flight / Train  Number </label>--}}
                {{--<input id="flight_number" class="inputField" type="text" name="flight_number" placeholder="Eg: BA001" value="{{old('flight_number')}}">--}}
                {{--</div>--}}

                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                {{--<label for="flight_origin">Flight/Train Origin</label>--}}
                {{--<input id="flight_origin" class="form-control col-md-7 col-xs-12" name="flight_origin" placeholder="Eg: Milan" required="required" type="text" value="{{old('flight_origin')}}">--}}
                {{--</div>--}}


                {{--</div>--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-12    col-sm-12">--}}
                {{--<label for="return">Return Ride</label>--}}
                {{--<select id="return" name="return">--}}
                {{--<option value="1" >Yes</option>--}}
                {{--<option value="0" selected>No</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row" id="rDate" style="display: none">--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="return_date">Return Date/Time</label>--}}
                {{--<input id="return_date" class="inputField" type="date" name="return_date" placeholder="Specify Return Date" disabled>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label  for="return_time">Return Time--}}
                {{--</label>--}}
                {{--<div class='input-group date' id='return_time1'>--}}
                {{--<input type='text' id="return_time" class="form-control" name="return_time" disabled>--}}
                {{--<span class="input-group-addon">--}}
                {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}


                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label for="">Passenger Details (Must Not Exceed Vehicle Capacity)</label>--}}
                {{--<br>--}}
                {{--<span>Adult</span> <span><input class="" type="number" name="adult" min="1" max="10" value="{{old('adult')}}"></span>--}}
                {{--<span>Child</span> <span><input class="" type="number" name="child" min="1" max="10" value="{{old('child')}}"></span>--}}
                {{--<span>Luggage</span> <span><input class="" type="number" name="luggage" min="1" max="5" value="{{old('luggage')}}"></span>--}}
                {{--<span>Carryon</span> <span><input class="" type="number" name="carryon" min="1" max="5" value="{{old('carryon')}}"></span>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-12">--}}
                {{--<label style="padding-bottom: 24px;" for="email">Meet & Greet (£{{$siteSettings[0]->value}})</label>--}}
                {{--<select id="meet" name="meet">--}}
                {{--<option value=1>Yes</option>--}}
                {{--<option value=0 selected>No</option>--}}
                {{--</select>--}}
                {{--</br>--}}
                {{--<label for="booking_details">Additional Instruction (if any)</label>--}}
                {{--<textarea id="booking_details" class="inputField" name="add_info" placeholder="Eg: 1 baby seat or 40 mins delay"></textarea>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-inline payment-btn-group">
                            {{--<button class="btn payment-btn" type="button">Card</button>--}}
                            {{--<button class="btn payment-btn" type="button">{{'Total Fair £'.$price}}</button>--}}
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input id="policy" type="checkbox" name="terms" value="" style="width: auto;box-shadow: none; float: left;display: inline-block;
"><span style="
    display: inline-block;
    margin-top: 10px;
">Click to accept <a style="color: #0b97c4" target="_blank" href="{{route('terms')}}">terms & conditions</a>.</span> </br>
                        </div>
                        <input id="hiddenPrice" type="hidden" name="hiddenPrice" value="{{round($price, 2)}}">
                        <input id="hiddenReturnPrice" type="hidden" name="hiddenReturnPrice" value="{{round($returnPrice, 2)}}">
                        <input id="hiddenCarPrice" type="hidden" name="carPrice" value="0">
                        <input  type="hidden" name="location_id" value="{{$location}}">
                        <input  type="hidden" name="airport_id" value="{{$airport}}">
                        <input type="hidden" name="from_to" value="{{$maintain}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


                        {{--@if(Auth::check())--}}

                        <div class="" style="float: right;text-align:center;width:100%">
                            {{--<div class="boxed" style="border: 1px solid green ;">--}}
                            {{--{{'Book Now with Total Fair £'.round($price, 2)}}--}}
                            {{--</div>--}}
                            {{--<button style="margin-top: 1px" id="bookingButton" class="btn confirmBtn1" type="submit" disabled="disabled"> {{'Book Now with Total Fair £'.round($price, 2)}} </button>--}}
                            <h4 id="bookingButton">{{'Total Fair £'.round($price, 2)}}</h4>
                            <input style="width:160px" id="bookButton" class="btn sudmitBtn shadow" type="submit" value="BOOK NOW">
                            {{--<button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit" disabled="disabled">{{'Pay By Paypal'}}</button>--}}
                        </div>
                        {{--@else--}}
                        {{--<div class="col-md-12 col-sm-12">--}}
                        {{--<a href="/login" class="button">Login</a>--}}
                        {{--<a href="/register" class="button">Register</a>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                </div>




                {{--<div class="row">--}}
                {{--<div class="col-md-12 col-sm-12">--}}
                {{--</div>--}}
                {{--</div>--}}






            </div>
        </form>
    </section>
@endsection

@section('js')
    <script src="{{asset("js/moment.min.js")}}"></script>
    <script src="{{asset("js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js")}}"></script>

    <script>
        $( document ).ready(function() {
            console.log( "ready!" );
            $('html, body').animate({
                scrollTop: $("#book").offset().top
            }, 2000);
        });
    </script>
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
            returnPrice = parseFloat(returnPrice);
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
            price = parseFloat(price);
            console.log(tp, price, returnPrice, carPrice, meetPrice)

            tp = price + returnPrice + carPrice + meetPrice;
            $("#hiddenPrice").val(function() {
                tp = parseFloat(tp);
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
            document.getElementById("return_dropoff_address").disabled = (this.value === '0');
            var xy = document.getElementById("rDA");
            if (xy.style.display === "none") {
                xy.style.display = "block";
            } else {
                xy.style.display = "none";
            }
            document.getElementById("return_pickup_address").disabled = (this.value === '0');
            var xz = document.getElementById("rPA");
            if (xz.style.display === "none") {
                xz.style.display = "block";
            } else {
                xz.style.display = "none";
            }
            document.getElementById("return_time").disabled = (this.value === '0');
            var e = document.getElementById("car_type");
            var car_type = e.options[e.selectedIndex].value;
            var cars = {!! json_encode($cars) !!};
            var price = {!! json_encode($price) !!};
            price = parseFloat(price);
            price = price.toFixed(2);
            // alert(price);
            var returnPrice = {!! json_encode($returnPrice) !!};
            returnPrice = parseFloat(returnPrice);
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