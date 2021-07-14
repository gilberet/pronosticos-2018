<div class="table-responsive">
<table class="table table-striped table-bordered table-responsive" id="apuestas-table">
    <thead>
    <tr>
        <th>Equipo Casa</th>
        <th>Goles Casa</th>
        <th>Goles Fuera</th>
        <th>Equipo Fuera</th>
        <th>Usuario</th>
        {{--<th>Estado</th>--}}
        <th >Accion</th>
    </tr>
    </thead>
    <tbody>
    @foreach($apuestas->where('fasegrupo_id', $fases->id) as $apuesta)
        <tr @if($apuesta->user_id == Auth::user()->id) class="success" @endif>
            <td>{!! $apuesta->fasesgrupos->equipocasa->nombre !!}
                <img src="{!! $apuesta->fasesgrupos->equipocasa->imagen !!}"
                     alt="{!! $apuesta->fasesgrupos->equipocasa->nombre !!}" height="25" width="32"
                     style="margin-left:5px; border: #00008B 1px solid;">
            </td>

            <td>
                {!! $apuesta->golcasa !!}
            </td>
            <td>
                {!! $apuesta->golfuera !!}
            </td>
            <td>
                <img src="{!! $apuesta->fasesgrupos->equipofuera->imagen !!}"
                     alt="{!! $apuesta->fasesgrupos->equipofuera->nombre !!}" height="25" width="32"
                     style="margin-left:5px; border: #00008B 1px solid;">
                {!! $apuesta->fasesgrupos->equipofuera->nombre !!}
            </td>
            <td>{!! $apuesta->usuario->name !!}</td>

            {{--<td>--}}
                {{--<label class="label  @if( $apuesta->estado == 0) label-success @else  label-danger  @endif">--}}
                {{--@if( $apuesta->estado == 0)--}}
                    {{--En Juego--}}
                {{--@else--}}
                    {{--Eliminado--}}
                {{--@endif--}}
                {{--</label>--}}
            {{--</td>--}}

            @if($apuesta->fasesgrupos->estado == 0)
            <td>
                <div class='btn-group'>
                    {!! Form::open(['route' => ['apuestas.destroy', $apuesta->id], 'method' => 'delete']) !!}
                    @if($apuesta->fasesgrupos->estado == 0 && ($apuesta->user_id == Auth::user()->id) || Auth::user()->id == 1)
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro eliminar?')"]) !!}
                    @endif

                </div>
                {!! Form::close() !!}
                </div>
            </td>
        @endif
        </tr>
    @endforeach
    </tbody>
</table>

</div>
