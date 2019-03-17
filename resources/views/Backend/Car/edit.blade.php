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
                        <h2>Car Type <small>create</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate method="post" action="{{route('cars.update', $car->id )}}">

                            @csrf

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$car->name}}" id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Car Type" required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="size">Number of Passengers <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$car->size}}" type="number" id="size" name="size" placeholder="Maximum number of Passengers can Travel" data-validate-minmax="1,20" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="luggage">Number of Luggage<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$car->luggage}}" type="number" id="luggage" name="luggage" placeholder="Maximum number of Luggage" required="required" data-validate-minmax="1,30" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fair">Fair plus<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{$car->fair}}" type="number" id="fair" name="fair" placeholder="Fair to be Added" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Active<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="status" class="btn-group" data-toggle="buttons">
                                        @if($car->status == 0)
                                        <label  class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input  checked type="radio" name="status" value="0" required="required">Inactive
                                        </label>
                                        @else
                                            <label  class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input  type="radio" name="status" value="0" required="required">Inactive
                                            </label>
                                        @endif
                                        {{--{{dd($car->status)}}--}}
                                        @if($car->status == 1)
                                        <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input  checked  type="radio" name="status" value="1" required="required"> Active
                                        </label>
                                        @else
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="status" value="1" required="required"> Active
                                        </label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea  id="description" required="required" name="description" class="form-control col-md-7 col-xs-12">{{$car->description}}</textarea>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Save</button>
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