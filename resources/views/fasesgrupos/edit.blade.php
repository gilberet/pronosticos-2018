@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fases de Grupo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fasesgrupo, ['route' => ['fasesgrupos.update', $fasesgrupo->id], 'method' => 'patch']) !!}

                        @include('fasesgrupos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
