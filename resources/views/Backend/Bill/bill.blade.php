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
                        <h2>Basic Model <small>Bill</small></h2>
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
                            {{--<li><a title="Create a Car Type" id="form_submit" href="#" class="btn btn-app">--}}
                            {{--<i class="fa fa-user"></i> <span>Create Payment</span>--}}
                            {{--</a>--}}
                            {{--<a class="close-link"><i class="fa fa-close"></i></a>--}}
                            {{--</li>--}}
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{--<p class="text-muted font-13 m-b-30">--}}
                        {{--DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>--}}
                        {{--</p>--}}
                        @if($bills != null)
                            <form class="form-horizontal form-label-left" name="payment" id="payment" novalidate method="POST" action="{{ route('invoice.store') }}">
                                @csrf
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>SL. No.</th>
                                        <th>Bill ID</th>
                                        <th>Total Amount</th>
                                        <th>Total Commission</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    <?php $count = 1 ; ?>
                                    @foreach($bills as $bill)
                                        <tr>
                                            {{--<td><input type="checkbox" name="bill_id[]" value="{{$bill->id}}"></td>--}}
                                            <td>{{$count}}</td>
                                            <td>{{$bill->id}}</td>
                                            <td>{{$bill->total_bill}}</td>
                                            <td>{{$bill->total_commission}}</td>
                                            <td>{{$bill->total_payable}}</td>
                                            <td>
                                                {{--<a href="{{route('cars.show', $user->id)}}" data-toggle="modal"  class="btn btn-sm btn-success viewFunction">--}}
                                                {{--<i class="fa fa-eye"></i>--}}
                                                {{--</a> ||--}}
                                                <a title="Show Bill" href="{{route('bill.show', $bill->id)}}" data-toggle="modal" class="btn btn-sm btn-warning editFunction" data-row-id="37">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <!--||-->

                                            <!--<a title="Generate Bill" class="btn btn-success" onclick="return confirm('Are you sure?')" href="{{route('bill.generate', $bill->id)}}" class="btn btn-sm btn-success">-->
                                                <!--    <i class="fa fa-file-pdf-o"></i>-->
                                                <!--</a>-->

{{--                                            <!--@if(Storage::disk('public')->exists('/csv/'.$bill->id.'.pdf'))-->--}}
                                                ||
                                                <a title="Download PDF" class="btn btn-info" onclick="return confirm('Are you sure?')" href="{{route('bill.email', $bill->id)}}" class="btn btn-sm btn-success">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <!--@endif-->
                                                @if($bill->status == 0)
                                                    ||
                                                    <a title="Collect Bill" class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('bill.collect', $bill->id)}}" class="btn btn-sm btn-success">
                                                        <i class="fa fa-money"></i>
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                        <?php $count ++ ; ?>
                                    @endforeach

                                    </tbody>
                                </table>
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

@append