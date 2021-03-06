@extends('2Frontend.layout')

@section('content')
    <div ></div>
    <section id="confirm" class="booking-form" >
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container confirm">
            <div class="row confirm">
                <div class="col-md-12 col-sm-12">

                    <h3>Your Booking ID: {{$booking->id}}</h3>
                    <h3>Your Booking amount: £{{$booking->final_price}}</h3>
                    @if($booking->confirm != 1)
                    <div class="col-md-12 col-sm-12">
                        {{--{{dd($siteSettings[8]-)}}--}}
                        @if($siteSettings[8]->value != "0" )
                        <form class="form-horizontal " novalidate method="POST" action="{{ route('cashPayment') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$booking->id}}">
                            <button style="margin-top: 1px" name="type" value="cash" id="bookingButton" class="btn confirmBtn" type="submit"> {{'Pay Cash'}} </button>
                        </form>
                        @endif
                        {{--<form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('paypalPayment') }}">--}}
                            {{--@csrf--}}
                            {{--<input type="hidden" name="amount" value="{{$booking->final_price}}">--}}
                            {{--<input type="hidden" name="booking_id" value="{{$booking->id}}">--}}
                            {{--<button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit">{{'Pay By Paypal'}}</button>--}}
                        {{--</form>--}}
                        <div id="paypal-button"></div>
                    </div>
                    @endif

                </div></div></div></section>
@endsection

@section('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <script>
        paypal.Button.render({
            env: 'sandbox', // Or 'production'
            // Set up the payment:
            // 1. Add a payment callback

            payment: function(data, actions) {
                var id = {!! json_encode($booking->id) !!};

                // 2. Make a request to your server
                return actions.request.post('/api/create-payment', {
                        booking_id: id
                })
                    .then(function(res) {
                        // 3. Return res.id from the response
                        return res.id;
                    });
            },
            // Execute the payment:
            // 1. Add an onAuthorize callback
            onAuthorize: function(data, actions) {
                var id = {!! json_encode($booking->id) !!};
                // 2. Make a request to your server
                return actions.request.post('/api/execute-payment/', {
                    paymentID: data.paymentID,
                    payerID:   data.payerID,
                    booking_id: id
                })
                    .then(function(res) {
                        if (res.error === 'INSTRUMENT_DECLINED') {
                            return actions.restart();
                        }
                        alert("Payment Successful.");
                        console.log(res.id);
                        window.location.href = "/payment-status?paymentId="+res.id+"&booking_id="+id+"&type=user";
                    });
            }
        }, '#paypal-button');
    </script>
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        $('html, body').animate({
            scrollTop: $("#confirm").offset().top
        }, 2000);
    });
</script>
@append