@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <a href="{!! route('apuestas.index') !!}" class="btn btn-primary"><</a>
            Apuesta
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')


                        @include('apuestas.fields')

    </div>
@endsection
