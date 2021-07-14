@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Acumulado
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($acumulado, ['route' => ['acumulados.update', $acumulado->id], 'method' => 'patch']) !!}

                        @include('acumulados.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection