@extends('admin.layouts.main')

@section('title')
    Dashboard panel
@endsection

@section('css')
    <style>
        #chartDiv {
            /*width: 100%;*/
            height: 250px;
            font-size: 10px;
        }

        #monthDiv {
            /*width: 100%;*/
            height: 250px;
            font-size: 10px;
        }

        .doughnut1 {
            border: 10px solid #55D1D1;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut2 {
            border: 10px solid #C2B3E1;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut3 {
            border: 10px solid #77BFEF;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut4 {
            border: 10px solid #FFC59B;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut5 {
            border: 10px solid #DF9398;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }

        .doughnut6 {
            border: 10px solid #EBD650;
            border-radius: 100px;
            height: 120px;
            width: 120px;
        }
    </style>
@endsection

@section('page-header')
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
@endsection