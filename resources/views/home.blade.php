@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="content-header">
            <h1 class="pull-left">Grupos de Hoy</h1>
        </section>
        <div class="content">
            <div class="clearfix"></div>

            @include('flash::message')

            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-responsive" id="apuestas-table">
                            <thead>
                            <tr>

                                <th>Equipo Casa</th>
                                <th>Gol Casa</th>
                                <th>Gol Fuera</th>
                                <th>Equipo Fuera</th>
                                <th>Apuestas</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fasesgrupos as $fasesgrupo)
                                <tr>

                                    <td>
                                        {!! $fasesgrupo->equipocasa->nombre !!}
                                        <img src="{!! $fasesgrupo->equipocasa->imagen !!}"
                                             alt="{!! $fasesgrupo->equipocasa->nombre !!}" height="25" width="32"
                                             style="margin-left:5px; border: #00008B 1px solid;">
                                    </td>
                                    <td>{!! $fasesgrupo->golcasa !!}</td>
                                    <td>{!! $fasesgrupo->golfuera !!}</td>
                                    <td>
                                        <img src="{!! $fasesgrupo->equipofuera->imagen !!}"
                                             alt="{!! $fasesgrupo->equipofuera->nombre !!}" height="25" width="32"
                                             style="margin-left:5px; border: #00008B 1px solid;">
                                        {!! $fasesgrupo->equipofuera->nombre !!}
                                    </td>
                                    <td>{!! $apuestas->where('fasegrupo_id',$fasesgrupo->id )->count() !!}</td>
                                    <td>{!! $fasesgrupo->fecha !!}</td>
                                    <td>{!! $fasesgrupo->hora !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-success btn-sm" href="{!! route('apuestas.index') !!}"><i class="fa fa fa-handshake-o"></i><span> Apuestas</span></a>
            </div>
        </div>



</div>
</div>
@endsection
