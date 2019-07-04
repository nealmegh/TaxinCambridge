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
                        <h2>Basic Model <small>Locations</small></h2>
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
                            <li><a title="Create a Airport" href="{{route('location.create')}}" class="btn btn-app">
                                    <i class="fa fa-plane"></i> <span>Create </span>
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
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Location</th>
                                <th>Airport</th>
                                <th>Fair</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($locations as $location)
                                @foreach($location->airports as $airport)
                                <tr>
                                    <td>{{$location->name}}</td>
                                    <td>{{$airport->name}}</td>

                                    <td>
                                        {{--<a href="{{route('cars.show', $user->id)}}" data-toggle="modal"  class="btn btn-sm btn-success viewFunction">--}}
                                        {{--<i class="fa fa-eye"></i>--}}
                                        {{--</a> ||--}}
                                        {{--<a href="{{route('location.edit', $location->id)}}" data-toggle="modal" class="btn btn-sm btn-warning editFunction" data-row-id="37">--}}
                                            {{--<i class="fa fa-pencil"></i>--}}
                                        {{--</a>--}}
                                        {{--||--}}

                                        {{--<a href="{{route('cars.delete', $user->id)}}" class="btn btn-sm btn-danger">--}}
                                        {{--<i class="fa fa-trash"></i>--}}
                                        {{--</a>--}}
                                        {{$airport->pivot->price}}
                                    </td>
                                </tr>
                                    @endforeach
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