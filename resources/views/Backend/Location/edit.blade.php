@extends('Backend.layout')
@section('css')
    {{--@include('Backend.Car.Associate.css');--}}
@append

@section('content')
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>User <small>Edit</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('location.update', $location->id )}}">

                            @csrf

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$location->name}}" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Name of the Airport" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="display_name">Display Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$location->display_name}}" type="text" id="display_name" name="display_name" placeholder="Display Name of the Airport" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            @foreach($location->airports as $airport)
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="{{'price'.$airport->id}}">{{$airport->name}} <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <input value="{{$airport->pivot->price}}" id="{{'price'.$airport->id}}" class="form-control col-md-7 col-xs-12" name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="number">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <input value="{{$airport->pivot->return_price}}" id="{{'return_price'.$airport->id}}" class="form-control col-md-7 col-xs-12" name="{{'return_price'.$airport->id}}" placeholder="Return Price" required="required" type="number">
                                    </div>
                                </div>
                            @endforeach
{{--                            {{dd($location->airports)}}--}}
                            @foreach($airports as $airport)
                                {{--@foreach($location->airports as $check)--}}
                                    @if(!$location->airports->contains($airport))
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="{{'price'.$airport->id}}">{{$airport->name}} <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="0" id="{{'price'.$airport->id}}" class="form-control col-md-7 col-xs-12" name="{{'price'.$airport->id}}" placeholder="Price" required="required" type="number">
                                    </div>
                                </div>
                                    @endif
                                {{--@endforeach--}}
                            @endforeach
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    @include('Backend.Car.Associate.js');
@append