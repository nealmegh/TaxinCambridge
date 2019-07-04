@extends('Backend.layout')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <div class="">
        <div class="page-title">
            {{--<div class="title_left">--}}
            {{--<h3>Cars <small>(Type of Cars available to BOOK)</small></h3>--}}
            {{--</div>--}}

            <div class="title_right">
                {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">Go!</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Basic Model <small>Invoice</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="#">Settings 1</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Settings 2</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            <li><a title="Create a Car Type" id="form_submit" href="#" class="btn btn-app">
                                    <i class="fa fa-user"></i> <span>Create Bill</span>
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
                        @if($driverInvoices != null)
                            <form class="form-horizontal form-label-left" name="payment" id="payment" novalidate method="POST" action="{{ route('invoice.store') }}">
                                @csrf
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Invoice ID</th>
                                        <th>Booking ID</th>
                                        <th>Passenger Details</th>
                                        <th>Trip Info</th>
                                        <th>Cash Type</th>
                                        <th>Total Amount</th>
                                        {{--<th>Actions</th>--}}
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($driverInvoices as $invoice)
                                        <tr>
                                            <td><input type="checkbox" id="invoice_id" name="invoice_id[]" value="{{$invoice->id}}"></td>
                                            <td>{{$invoice->id}}</td>
                                            <td>{{$invoice->booking->id}}</td>
                                            <td>{{$invoice->booking->user->name}} <br>
                                                {{$invoice->booking->user->phone}}
                                            </td>
                                            <td>To:{{$invoice->booking_from}} <br>
                                                From:{{$invoice->booking_to}}</td>
                                            <td>{{$invoice->payment_type}}</td>
                                            <td>{{$invoice->total_amount}}</td>
                                            {{--<td>--}}
                                                {{--<a href="{{route('cars.show', $user->id)}}" data-toggle="modal"  class="btn btn-sm btn-success viewFunction">--}}
                                                {{--<i class="fa fa-eye"></i>--}}
                                                {{--</a> ||--}}
                                                {{--<a href="{{route('driver.edit', $invoice->id)}}" data-toggle="modal" class="btn btn-sm btn-warning editFunction" data-row-id="37">--}}
                                                    {{--<i class="fa fa-pencil"></i>--}}
                                                {{--</a>--}}
                                                {{--||--}}

                                                {{--<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('driver.delete', $invoice->id)}}" class="btn btn-sm btn-danger">--}}
                                                    {{--<i class="fa fa-trash"></i>--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{--<input type="submit" >--}}
                            </form>
                        @else
                            <p> No Invoice for this driver </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    @include('Backend.Car.Associate.js');
    <script>
        $('#form_submit').click(function () {
            if (!$('#invoice_id').is(':checked')) {
                alert('At least check one of the Invoice');
                return false;
            }
            else {
                var x = document.getElementsByName('payment');
                x[0].submit();
            }
        });



    </script>


@append