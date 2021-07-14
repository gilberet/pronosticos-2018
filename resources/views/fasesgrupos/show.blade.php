@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <a href="{!! route('fasesgrupos.index') !!}" class="btn btn-primary"><</a>
            Fase de Grupo

        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('fasesgrupos.show_fields')
                </div>
            </div>
        </div>
    </div>

@endsection
