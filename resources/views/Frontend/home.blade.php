@extends('Frontend.layout')

@section('css')

@append

@section('content')
    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner mb-30px">
        <div class="container">
            <div class="row">
                <div class="banner-content">
                    <h1>Stop waiting</h1>
                    <p>Stop waiting for something that may not be coming</p>
                    <p>Dial (01223) 247247 for Carot Cars, so you are not left waiting</p>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->


    <!--================ Booking section start =================-->
    <section class="booking-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3>Book a car online</h3>
                </div>
            </div>
            <form class="form-horizontal form-label-left" novalidate method="GET" action="{{ route('booking') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        {{--<input class="inputField" type="text" name="FirstName" placeholder="From">--}}
                        <div class="form-group">
                            <label style="text-align: left;" for="selectFrom" class="control-label col-md-3 col-sm-3 col-xs-12">From</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select id="selectFrom" name="selectFrom" class="select2_group form-control">
                                    <option value="placeholder" selected>Choose a Pick-Up Point</option>
                                    <optgroup label="Airports">
                                        @foreach($airports as $airport)
                                            <option value="{{'air'.$airport->id}}">{{$airport->display_name}}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Area">
                                        @foreach($locations as $location)
                                            <option value="{{'loc'.$location->id}}">{{$location->display_name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="selectTo" class="control-label col-md-3 col-sm-3 col-xs-12">To</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select id="selectTo" name="selectTo" class="select2_group form-control">
                                    <option selected>Choose a Drop-Off Point</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input id="hiddenTo" type="hidden" name="hiddenTo" value="0">
                    <input id="hiddenFrom" type="hidden" name="hiddenFrom" value="0">
                    <input id="hiddenPrice" type="hidden" name="hiddenPrice" value="0">
                    <div class="col-md-4 col-sm-12">
                        <input id="bookButton" class="btn sudmitBtn shadow" type="submit" value="BOOK" disabled>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--================ Booking section end =================-->




@endsection

@section('js')
    <script type="text/javascript">

        $('#selectFrom').on('change', function() {
            var e = document.getElementById("selectFrom");
            var selectValue = e.options[e.selectedIndex].value;
            var air = 'air';
            var check = selectValue.search(air);
            $("#hiddenFrom").val(function() {
                return selectValue;
            });
            if(check == 0)
            {
                // var select = document.getElementById("selectTo").empty();
                var select =

                    $('#selectTo')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Choose a Drop-Off Point</option>')
                ;


                var locations = {!! json_encode($locations) !!};
                // console.log(airports[0].name);
                for(var i=0; i<locations.length; i++)
                {
                    var option = document.createElement("option");
                    option.text = locations[i].display_name;
                    option.value = locations[i].id;
                    var select = document.getElementById("selectTo");
                    select.appendChild(option);

                }

            }
            else {
                var select =

                    $('#selectTo')
                        .find('option')
                        .remove()
                        .end()
                        .append('<option value="">Choose a Drop-Off Point</option>')
                ;
                var airports = {!! json_encode($airports) !!};
                // console.log(airports[0].name);
                for(var i=0; i<airports.length; i++)
                {
                    var option = document.createElement("option");
                    option.text = airports[i].display_name;
                    option.value = airports[i].id;
                    var select = document.getElementById("selectTo");
                    select.appendChild(option);

                }
            }
        });


    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#selectTo').on('change', function() {

            var e = document.getElementById("selectFrom");
            var selectFromValue = e.options[e.selectedIndex].value;
            var f = document.getElementById("selectTo");
            var selectToValue = f.options[f.selectedIndex].value;

            $("#hiddenTo").val(function() {
                return selectToValue;
            });



            $.ajax({
                type : "POST",
                url : 'getFair',
                data : {from: selectFromValue, to: selectToValue},
                success:function(data){
                    $("#bookButton").prop('disabled', false);
                    $("#bookButton").val(function() {
                        data.msg = parseFloat(data.msg);
                        return 'Book with £ ' +  data.msg.toFixed(2);
                    });
                    $("#hiddenPrice").val(function() {
                        return data.msg;
                    });
                },
                error:function(){

                }
            });

        });

    </script>
@append