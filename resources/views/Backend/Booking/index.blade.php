@extends('Backend.layout')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <div class="">
        <div class="page-title">


            <div class="title_right">
{{--{{dd($errors->first())}}--}}
                {{--@if($errors->any())--}}
                    {{--<h4>{{$errors->first()}}</h4>--}}
                {{--@endif--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Basic Model <small>Bookings</small></h2>
                        <ul class="nav navbar-right panel_toolbox">

                            <li><a title="Create a Booking" href="{{route('booking.create')}}" class="btn btn-app">
                                    <i class="fa fa-user"></i> <span>Create </span>
                                </a>
                                {{--<a class="close-link"><i class="fa fa-close"></i></a>--}}
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{--<p class="text-muted font-13 m-b-30">--}}
                            {{--DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>--}}
                        {{--</p>--}}
                        <table id="datatable1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Price</th>
                                <th>Driver</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                @if($booking->user != null)
                                <td>{{$booking->user->name}}</td>
                                <td>{{$booking->user->email}}</td>
                                <td>{{$booking->user->phone}}</td>
                                @else
                                    <td>{{'Customer Data is Not Available'}}</td>
                                    <td>{{'Customer Data is Not Available'}}</td>
                                    <td>{{'Customer Data is Not Available'}}</td>
                                @endif
                                @if($booking->final_price == null)
                                    <td>{{$booking->price}}</td>
                                @else
                                    <td>{{$booking->final_price}}</td>
                                @endif

                                @if($booking->driver == null)
                                    <td>
                                        <a href="{{route('booking.assign', $booking->id)}}" data-toggle="modal" class="btn btn-sm btn-info editFunction" data-row-id="37">
                                        Assign</a>
                                    </td>
                                @else
                                <td>{{$booking->driver->name}}</td>
                                @endif
                                @if($booking->user_transaction_id == null)
                                    <td>
                                        <a href="{{route('booking.payment', $booking->id)}}" data-toggle="modal" class="btn btn-sm btn-info editFunction" data-row-id="37">
                                            Payment Confirmation</a>
                                    </td>
                                @else
                                    <td>{{$booking->userTransaction->payment_id}}</td>
                                @endif

                                    @if($booking->complete_status == Null)
                                    <td> <a href="{{route('booking.complete', $booking->id)}}" data-toggle="modal" class="btn btn-sm btn-info editFunction" data-row-id="37">
                                            Job Completion</a> </td>
                                    @else
                                    <td>{{'Completed'}}</td>
                                    @endif

                                <td>
                                    {{--<a href="{{route('cars.show', $user->id)}}" data-toggle="modal"  class="btn btn-sm btn-success viewFunction">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                    {{--</a> ||--}}
                                    <a  href="{{route('booking.edit', $booking->id)}}" data-toggle="modal" class="btn btn-sm btn-warning editFunction" data-row-id="37">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    ||

                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('booking.delete', $booking->id)}}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('js')
    @include('Backend.Car.Associate.js');
    <script>
        $(document).ready(function() {
            $('#datatable1').DataTable( {
                "aaSorting": [[ 0, "desc" ]]
            } );
        } );
    </script>
@append