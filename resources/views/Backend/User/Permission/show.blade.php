@extends('Backend.layout')
@section('css')
    @include('Backend.Car.Associate.css');
@append

@section('content')
    <style>
        div.blueTable {
            border: 1px solid #1C6EA4;
            background-color: #EEEEEE;
            width: 100%;
            height: 200%;
            text-align: left;
            border-collapse: collapse;
        }
        .divTable.blueTable .divTableCell, .divTable.blueTable .divTableHead {
            border: 1px solid #AAAAAA;
            padding: 3px 2px;
        }
        .divTable.blueTable .divTableBody .divTableCell {
            font-size: 13px;
        }
        .divTable.blueTable .divTableRow:nth-child(even) {
            background: #D0E4F5;
        }
        .divTable.blueTable .divTableHeading {
            background: #1C6EA4;
            background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
            background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
            background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
            border-bottom: 2px solid #444444;
        }
        .divTable.blueTable .divTableHeading .divTableHead {
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            border-left: 2px solid #D0E4F5;
        }
        .divTable.blueTable .divTableHeading .divTableHead:first-child {
            border-left: none;
        }

        .blueTable .tableFootStyle {
            font-size: 14px;
        }
        .blueTable .tableFootStyle .links {
            text-align: right;
        }
        .blueTable .tableFootStyle .links a{
            display: inline-block;
            background: #1C6EA4;
            color: #FFFFFF;
            padding: 2px 8px;
            border-radius: 5px;
        }
        .blueTable.outerTableFooter {
            border-top: none;
        }
        .blueTable.outerTableFooter .tableFootStyle {
            padding: 3px 5px;
        }
        /* DivTable.com */
        .divTable{ display: table; }
        .divTableRow { display: table-row; }
        .divTableHeading { display: table-header-group;}
        .divTableCell, .divTableHead { display: table-cell;}
        .divTableHeading { display: table-header-group;}
        .divTableFoot { display: table-footer-group;}
        .divTableBody { display: table-row-group;}
    </style>
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Car Type <small>Show</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
    <div class="divTable blueTable">
        <div class="divTableHeading">
            <div class="divTableRow">
                <div class="divTableHead">Attributes</div>
                <div class="divTableHead">Values</div>
            </div>
        </div>
        <div class="divTableBody">
            <div class="divTableRow">
                <div class="divTableCell">Name</div><div class="divTableCell">{{$car->name}}</div></div>
            <div class="divTableRow">
                <div class="divTableCell">Number of Passengers</div><div class="divTableCell">{{$car->size}}</div></div>
            <div class="divTableRow">
                <div class="divTableCell">Number of Luggage</div><div class="divTableCell">{{$car->luggage}}</div></div>
            <div class="divTableRow">
                <div class="divTableCell">Fair</div><div class="divTableCell">{{$car->fair}}</div></div>
            <div class="divTableRow">
                <div class="divTableCell">Description</div><div class="divTableCell">{{$car->description}}</div></div>
            <div class="divTableRow">
                <div class="divTableCell">Status</div><div class="divTableCell">{{$car->status}}</div></div>
        </div>
    </div>
                    </div></div></div></div>
@endsection

@section('js')
    @include('Backend.Car.Associate.js');
@append