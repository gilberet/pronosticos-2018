@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acumulado
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('acumulados.show_fields')
                    <a href="{!! route('acumulados.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
