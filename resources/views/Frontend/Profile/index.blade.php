@extends('Frontend.Profile.profile')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <div class="">
        <div class="page-title">


            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bookings <small>user</small></h2>
                        {{--<ul class="nav navbar-right panel_toolbox">--}}

                            {{--<li><a title="Create a Booking" href="{{route('booking.create')}}" class="btn btn-app">--}}
                                    {{--<i class="fa fa-user"></i> <span>Create </span>--}}
                                {{--</a>--}}
                                {{--<a class="close-link"><i class="fa fa-close"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{--<p class="text-muted font-13 m-b-30">--}}
                        {{--DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>--}}
                        {{--</p>--}}
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Booking Date</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Price</th>
                                <th>Driver</th>
                                {{--<th>Phone Number</th>--}}

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{$booking->id}}</td>
                                    <td>{{date('d-m-Y', strtotime($booking->journey_date))}}</td>
                                    @if($booking->form_to == 'loc')
                                        <td>{{$booking->location->display_name}}</td>
                                        <td>{{$booking->airport->display_name}}</td>
                                    @else
                                        <td>{{$booking->airport->display_name}}</td>
                                        <td>{{$booking->location->display_name}}</td>
                                    @endif

                                    <td>{{$booking->price}}</td>
                                    @if($booking->driver == null)
                                        <td>
                                            {{--<a href="{{route('booking.assign', $booking->id)}}" data-toggle="modal" class="btn btn-sm btn-info editFunction" data-row-id="37">--}}
                                                {{--Assign</a>--}}
                                            {{'Driver Yet to Assign'}}
                                        </td>
                                    @else
                                        <td>{{$booking->driver->name}}</td>
                                    @endif
                                    {{--<td>--}}
                                        {{--<a href="{{route('cars.show', $user->id)}}" data-toggle="modal"  class="btn btn-sm btn-success viewFunction">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                        {{--</a> ||--}}
                                        {{--<a href="{{route('booking.edit', $booking->id)}}" data-toggle="modal" class="btn btn-sm btn-warning editFunction" data-row-id="37">--}}
                                            {{--<i class="fa fa-pencil"></i>--}}
                                        {{--</a>--}}
                                        {{--||--}}

                                        {{--<a href="{{route('cars.delete', $user->id)}}" class="btn btn-sm btn-danger">--}}
                                        {{--<i class="fa fa-trash"></i>--}}
                                        {{--</a>--}}
                                    {{--</td>--}}
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
@append