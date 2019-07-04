@extends('Frontend.layout')

@section('css')
    <link href="{{asset("js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css")}}" rel="stylesheet">
<style>
    div.greenTable {
    font-family: Georgia, serif;
    border: 6px solid #24943A;
    background-color: #D4EED1;
    width: 100%;
    text-align: center;
    }
    .divTable.greenTable .divTableCell, .divTable.greenTable .divTableHead {
    border: 1px solid #24943A;
    padding: 3px 2px;
    }
    .divTable.greenTable .divTableBody .divTableCell {
    font-size: 13px;
    }
    .divTable.greenTable .divTableHeading {
    background: #24943A;
    background: -moz-linear-gradient(top, #5baf6b 0%, #3a9e4d 66%, #24943A 100%);
    background: -webkit-linear-gradient(top, #5baf6b 0%, #3a9e4d 66%, #24943A 100%);
    background: linear-gradient(to bottom, #5baf6b 0%, #3a9e4d 66%, #24943A 100%);
    border-bottom: 0px solid #444444;
    }
    .divTable.greenTable .divTableHeading .divTableHead {
    font-size: 19px;
    font-weight: bold;
    color: #F0F0F0;
    text-align: left;
    border-left: 2px solid #24943A;
    }
    .divTable.greenTable .divTableHeading .divTableHead:first-child {
    border-left: none;
    }

    .greenTable  {
    font-size: 13px;
    }
    .greenTable .tableFootStyle .links {
    text-align: right;
    }
    .greenTable .tableFootStyle .links a{
    display: inline-block;
    background: #FFFFFF;
    color: #24943A;
    padding: 2px 8px;
    border-radius: 5px;
    }
    .greenTable {
    border-top: none;
    }
    .greenTable.outerTableFooter  {
    padding: 3px 5px;
    }
    /* DivTable.com */
    .divTable{ display: table; }
    .divTableRow { display: table-row; }
    .divTableHeading { display: table-header-group;}
    .divTableCell, .divTableHead { display: table-cell;}
    .divTableHeading { display: table-header-group;}
    .divTableBody { display: table-row-group;}

</style>
@append

@section('content')
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                           <h3>Your Booking ID is {{$booking->id}}</h3>
                        <h3>Your Booking amount is {{$booking->price}}</h3>
                        <div class="col-md-12 col-sm-12" style="float: right">
                            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('cashPayment') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{$booking->id}}">
                            <button style="margin-top: 1px" name="type" value="cash" id="bookingButton" class="btn confirmBtn" type="submit"> {{'Pay Cash'}} </button>
                            </form>
                            <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('paypalPayment') }}">
                                @csrf
                                <input type="hidden" name="amount" value="{{$booking->price}}">
                                <input type="hidden" name="booking_id" value="{{$booking->id}}">
                            <button style="margin-top: 1px" name="type" value="paypal" id="bookingButton2" class="btn confirmBtn" type="submit">{{'Pay By Paypal'}}</button>
                            </form>
                        </div>

                    </div></div></div></section>

@endsection

@section('js')



@append