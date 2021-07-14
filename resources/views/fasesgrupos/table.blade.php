<table class="table table-responsive" id="fasesgrupos-table">
    <thead>
        <tr>
            <th>Grupo</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Estado</th>
        <th>Equipo Casa</th>
        <th>Gol Casa</th>
        <th>Gol Fuera</th>
        <th>Equipo Fuera</th>
            <th colspan="3">Accion</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fasesgrupos as $fasesgrupo)
        <tr>
            <td>{!! $fasesgrupo->grupo !!}</td>
            <td>{!! $fasesgrupo->fecha !!}</td>
            <td>{!! $fasesgrupo->hora !!}</td>
            <td>@if($fasesgrupo->estado == 0) Por Jugar @elseif($fasesgrupo->estado == 1) Finalizado @elseif($fasesgrupo->estado = 2) Cerrado @else Pasado  @endif </td>
            <td>
                {!! $fasesgrupo->equipocasa->nombre !!}
                <img src="{!! $fasesgrupo->equipocasa->imagen !!}"
                     alt="{!! $fasesgrupo->equipocasa->nombre !!}" height="25" width="32"
                     style="margin-left:5px; border: #00008B 1px solid;">
            </td>
            <td>{!! $fasesgrupo->golcasa !!}</td>
            <td>{!! $fasesgrupo->golfuera !!}</td>
            <td>
                <img src="{!! $fasesgrupo->equipofuera->imagen !!}"
                     alt="{!! $fasesgrupo->equipofuera->nombre !!}" height="25" width="32"
                     style="margin-left:5px; border: #00008B 1px solid;">
                {!! $fasesgrupo->equipofuera->nombre !!}

            </td>
            <td>
                {!! Form::open(['route' => ['fasesgrupos.destroy', $fasesgrupo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fasesgrupos.show', [$fasesgrupo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fasesgrupos.edit', [$fasesgrupo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro de Elimnar el Item?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
