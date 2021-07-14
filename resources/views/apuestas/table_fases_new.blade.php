<div class="table-responsive">
<table class="table table-striped  table-responsive" id="apuestas-table">
    <thead>
    <tr>
        <th>Accion</th>
        <th><center>Partidos a Jugar</center></th>
        <th>Apuestas</th>
        <th>Monto Bs.</th>
        <th>Fecha</th>
        <th>Hora</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fasesgrupos as $fasesgrupo)
    <tr>
        <td>
            <div class='btn-group'>
                <a  href="#"
                    @if($fasesgrupo->estado <> 0)  disabled="true" @else
                    data-toggle="modal" data-target="#modal-apuesta-{{$fasesgrupo->id}}"
                    @endif
                    class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-plus"></i> Agregar</a>
            </div>
        </td>

        <td>
            <center><h5>
                    <img src="{!! $fasesgrupo->equipocasa->imagen !!}"
                         alt="{!! $fasesgrupo->equipocasa->nombre !!}" height="25" width="32"
                         style="margin-left:5px; border: #00008B 1px solid;">
                    <span>{!! $fasesgrupo->equipocasa->nombre !!}</span>
                    <label for="" style="font-weight: bold; font-size: 15px;">VS</label>
                    <span>{!! $fasesgrupo->equipofuera->nombre !!}</span>
                    <img src="{!! $fasesgrupo->equipofuera->imagen !!}"
                         alt="{!! $fasesgrupo->equipofuera->nombre !!}" height="25" width="32"
                         style="margin-left:5px; border: #00008B 1px solid;">
                </h5></center>
        </td>
        <td>{!! $cant = $apuestas->where('fasegrupo_id',$fasesgrupo->id )->count() !!}</td>
        <td>{!! $apuestas->where('fasegrupo_id',$fasesgrupo->id )->count() * 5 !!} </td>
        <td>{!! $fasesgrupo->fecha !!}</td>
        <td>{!! $fasesgrupo->hora !!}</td>

    </tr>


    <!-- Modal -->
    <div class="modal fade modal-slide-in-right" aria-hidden="true" tabindex="-1" role="dialog" id="modal-apuesta-{!! $fasesgrupo->id !!}">
        <div class="modal-dialog">
        {!!Form::open(['route'=>['apuestas.store'], 'method'=>'POST'])!!}

            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nueva Apuesta</h4>
                </div>
                <div class="modal-body">
                    <input type="text" name="fasegrupo_id" value="{!! $fasesgrupo->id !!}" style="display: none">

                    <!-- Equipocasa Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('equipocasa_id', 'Equipo de Casa:') !!}
                            <p>
                            {!! $fasesgrupo->equipocasa->nombre !!}
                            <img src="{!! $fasesgrupo->equipocasa->imagen !!}"
                                 alt="{!! $fasesgrupo->equipocasa->nombre !!}" height="25" width="32"
                                 style="margin-left:5px; border: #00008B 1px solid;">
                            </p>
                        </div>

                        <!-- Equipofuera Id Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('equipofuera_id', 'Equipo de Fuera:') !!}
                            <p>
                            {!! $fasesgrupo->equipofuera->nombre !!}
                            <img src="{!! $fasesgrupo->equipofuera->imagen !!}"
                                 alt="{!! $fasesgrupo->equipofuera->nombre !!}" height="25" width="32"
                                 style="margin-left:5px; border: #00008B 1px solid;">
                            </p>
                        </div>


                        <!-- Gol Casa Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('golcasa', 'Gol Equipo Casa:') !!}
                            {!! Form::text('golcasa', 0, ['class' => 'form-control']) !!}
                        </div>

                        <!-- Gol Fuera Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('golfuera', 'Gol Equipo Fuera:') !!}
                            {!! Form::text('golfuera', 0, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-12" >
                            {!! Form::label('user_id', 'Usuario:') !!}
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a  data-dismiss="modal" class="btn btn-danger" >
                            <span class="fa fa-times"></span> Cancelar</a>
                        {!! form::button('<i class="fa fa-check"></i> Aceptar',
                        ['name'=>'aceptar', 'id'=>'aceptar',
                        'content'=>'<span>Aceptar</span>',
                        'class'=>'btn btn-success',
                        'type'=>'submit' ]) !!}
                    </div>
                </div>
            {!! Form::close()!!}

        </div>

        </div>
    </div>
    @endforeach
    </tbody>
</table>

</div>
