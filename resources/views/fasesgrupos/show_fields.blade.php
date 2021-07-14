
<div class="col-ms-12">

    <!-- Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('id', 'Id:') !!}
        <p>{!! $fasesgrupo->id !!}</p>
    </div>

    <!-- Grupo Field -->
    <div class="form-group  col-sm-6">
        {!! Form::label('grupo', 'Grupo:') !!}
        <p>{!! $fasesgrupo->grupo !!}</p>
    </div>

    <!-- Fecha Field -->
    <div class="form-group  col-sm-3">
        {!! Form::label('fecha', 'Fecha:') !!}
        <p>{!! $fasesgrupo->fecha !!}</p>
    </div>

    <!-- Hora Field -->
    <div class="form-group  col-sm-3">
        {!! Form::label('hora', 'Hora:') !!}
        <p>{!! $fasesgrupo->hora !!}</p>
    </div>

    <!-- Estado Field -->
    <div class="form-group  col-sm-3">
        {!! Form::label('estado', 'Estado:') !!}
        <p>@if($fasesgrupo->estado == 0) Habilitado @else Desabilitado  @endif </p>
    </div>

    <div class="row col-sm-12">
    <!-- Equipocasa Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('equipocasa_id', 'Equipo de Casa:') !!}
        <p>{!! $fasesgrupo->equipocasa->nombre !!}</p>
    </div>


    <!-- Golcasa Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('golcasa', 'Goles de Casa:') !!}
        <p>{!! $fasesgrupo->golcasa !!}</p>
    </div>
    </div>
<div class="row col-sm-12">
    <!-- Equipofuera Id Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('equipofuera_id', 'Equipo de Fuera:') !!}
        <p>{!! $fasesgrupo->equipofuera->nombre !!}</p>
    </div>


    <!-- Golfuera Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('golfuera', 'Goles de Fuera:') !!}
        <p>{!! $fasesgrupo->golfuera !!}</p>
    </div>
</div>
    <!-- Created At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{!! $fasesgrupo->created_at !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{!! $fasesgrupo->updated_at !!}</p>
    </div>

</div>
