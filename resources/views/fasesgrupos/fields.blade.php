<!-- Grupo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grupo', 'Grupo:') !!}
    {!! Form::text('grupo', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', ['0'=>'Por Jugar','1'=>'Finalizado','2'=>'Cerrado','3'=>'Pasado'],null, ['class' => 'form-control']) !!}
</div>

<div  class="form-group col-sm-12">
    <!-- Fecha Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha', 'Fecha:') !!}
        {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Hora Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('hora', 'Hora:') !!}
        {!! Form::time('hora', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Equipocasa Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipocasa_id', 'Equipo de Casa:') !!}
    {!! Form::select('equipocasa_id', $equipos, null, ['class' => 'form-control']) !!}
</div>

<!-- Equipofuera Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipofuera_id', 'Equipo de Fuera:') !!}
    {!! Form::select('equipofuera_id', $equipos  , null, ['class' => 'form-control']) !!}
</div>


<!-- Gol Casa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('golcasa', 'Gol Equipo Casa:') !!}
    {!! Form::text('golcasa', null, ['class' => 'form-control']) !!}
</div>

<!-- Gol Fuera Field -->
<div class="form-group col-sm-6">
    {!! Form::label('golfuera', 'Gol Equipo Fuera:') !!}
    {!! Form::text('golfuera', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fasesgrupos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
