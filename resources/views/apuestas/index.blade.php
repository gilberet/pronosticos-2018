@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Grupos de Hoy</h1>
        @if(Auth::user()->id == 1)
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('apuestas.create') !!}">Nuevo</a>
        </h1>@endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <p>El Acumulado hasta la fecha pasada es: <strong><span>{!! $acumulado->monto !!}</span> Bs.</strong></p>
                    @include('apuestas.table_fases')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>


    <section class="content-header">
        <h1 class="pull-left">Apuestas de Hoy</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @foreach($fasesgrupos as $fases)
            <div class="box box-danger">
                <h2 style="float: left; padding-left: 10px;"><strong>{!! $fases->golcasa !!}</strong></h2>
                <center><h3 ><span>{!! $fases->equipocasa->nombre !!}</span>
                <label for="" style="font-weight: bold; font-size: 30px;">VS</label>
                <span>{!! $fases->equipofuera->nombre !!}</span></h3></center>
                <h2 style="position: absolute; right: 10px; top: 0;"><strong>{!! $fases->golfuera !!}</strong></h2>
                <div class="box-body">
                    @include('apuestas.table')
                </div>
            </div>
        @endforeach
        <div class="text-center">

        </div>
    </div>
@endsection

