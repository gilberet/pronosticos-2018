<table class="table table-responsive" id="acumulados-table">
    <thead>
        <tr>
            <th>Monto</th>
        <th>Fecha</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($acumulados as $acumulado)
        <tr>
            <td>{!! $acumulado->monto !!}</td>
            <td>{!! $acumulado->fecha !!}</td>
            <td>
                {!! Form::open(['route' => ['acumulados.destroy', $acumulado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('acumulados.show', [$acumulado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('acumulados.edit', [$acumulado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>