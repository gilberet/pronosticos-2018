@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Apuesta
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($apuesta, ['route' => ['apuestas.update', $apuesta->id], 'method' => 'patch']) !!}

                        @include('apuestas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection