@extends('Frontend.Profile.profile')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <style>
        th{
            text-align: center !important;
        }
        .pass_show{position: relative}

        .pass_show .ptxt {

            position: absolute;

            top: 50%;

            right: 10px;

            z-index: 1;

            color: #f36c01;

            margin-top: -10px;

            cursor: pointer;

            transition: .3s ease all;

        }

        .pass_show .ptxt:hover{color: #333333;}
    </style>
    <div class="" >
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User Details <small>Show</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-striped text-center table-bordered">
                            <thead>
                            <tr>
                                <th>Attributes</th>
                                <th>Values</th>

                            </tr>
                            </thead>


                            <tbody>

                            <tr>
                                <td>Name</td>
                                <td>{{$user->name}}</td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$user->email}}</td>

                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{$user->phone}}</td>

                            </tr>

                            </tbody>
                        </table>
                        <button type="button" id="edit" class="btn btn-primary">Edit</button>
                    </div>

                    <div id="customer_edit" class="x_content" style="display: none">

                        <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('customer.update', $user->id )}}">

                        @csrf
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$user->name}}" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Car Type" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$user->email}}" id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="Car Type" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$user->phone}}" id="phone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="phone" placeholder="Car Type" required="required" type="text">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div></div></div>

    </div>

    <form class="form-horizontal form-label-left" novalidate method="POST" action="{{ route('changePassword') }}">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
            <h3>Change Password</h3>
            <div class="col-sm-4">

                <label>Current Password</label>
                <div class="form-group pass_show">
                    <input type="password" name="old_pass" value="" class="form-control" placeholder="Current Password">
                </div>
                <label>New Password</label>
                <div class="form-group pass_show">
                    <input type="password" name="new_pass" value="" class="form-control" placeholder="New Password">
                </div>
                <label>Confirm Password</label>
                <div class="form-group pass_show">
                    <input type="password" name="con_new_pass" value="" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="">
                    <button id="passChange" type="submit" class="btn btn-success">Submit</button>
                </div>

            </div>
                </div>
            </div>
        </div>
    </div>

    </form>
@endsection

@section('js')
    @include('Backend.Car.Associate.js');
    <script>

        $(document).ready(function(){
            $('.pass_show').append('<span class="ptxt">Show</span>');
        });


        $(document).on('click','.pass_show .ptxt', function(){

            $(this).text($(this).text() == "Show" ? "Hide" : "Show");

            $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

        });

        $(document).ready(function(){
            $('#edit').click(function() {
                $('#customer_edit').toggle("slide");
            });
        });
    </script>
@append

{{--@extends('Backend.layout')--}}
{{--@section('css')--}}
    {{--@include('Backend.Car.Associate.css');--}}
{{--@append--}}

{{--@section('content')--}}
    {{--<style>--}}
        {{--th{--}}
            {{--text-align: center !important;--}}
        {{--}--}}
    {{--</style>--}}
    {{--<div class="">--}}
        {{--<div class="clearfix"></div>--}}

        {{--<div class="row">--}}
            {{--<div class="col-md-12 col-sm-12 col-xs-12">--}}
                {{--<div class="x_panel">--}}
                    {{--<div class="x_title">--}}
                        {{--<h2>Car Type <small>Show</small></h2>--}}

                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="x_content">--}}

                        {{--<table class="table table-striped text-center table-bordered">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Attributes</th>--}}
                                {{--<th>Values</th>--}}

                            {{--</tr>--}}
                            {{--</thead>--}}


                            {{--<tbody>--}}

                                {{--<tr>--}}
                                    {{--<td>Name</td>--}}
                                    {{--<td>{{$car->name}}</td>--}}

                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Size</td>--}}
                                    {{--<td>{{$car->size}}</td>--}}

                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Luggage Capacity</td>--}}
                                    {{--<td>{{$car->luggage}}</td>--}}

                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Fair</td>--}}
                                    {{--<td>{{$car->fair}}</td>--}}

                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Description</td>--}}
                                    {{--<td>{{$car->description}}</td>--}}

                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Status</td>--}}
                                    {{--<td>@if($car->status == 0){{'Inactive'}}@else{{'Active'}}@endif</td>--}}

                                {{--</tr>--}}


                            {{--</tbody>--}}
                        {{--</table>--}}

                    {{--</div></div></div></div></div>--}}
{{--@endsection--}}

{{--@section('js')--}}
    {{--@include('Backend.Car.Associate.js');--}}
{{--@append--}}