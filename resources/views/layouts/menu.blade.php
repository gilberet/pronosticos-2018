@if( Auth::user()->id  == 1)
<li class="{{ Request::is('equipos*') ? 'active' : '' }}">
    <a href="{!! route('equipos.index') !!}"><i class="fa fa-edit"></i><span>Equipos</span></a>
</li>
<li class="{{ Request::is('fasesgrupos*') ? 'active' : '' }}">
    <a href="{!! route('fasesgrupos.index') !!}"><i class="fa fa-edit"></i><span>Fasesgrupos</span></a>
</li>
<li class="{{ Request::is('acumulados*') ? 'active' : '' }}">
    <a href="{!! route('acumulados.index') !!}"><i class="fa fa-edit"></i><span>Acumulados</span></a>
</li>
@endif
<li class="{{ Request::is('apuestas*') ? 'active' : '' }}">
    <a href="{!! route('apuestas.index') !!}"><i class="fa fa-edit"></i><span>Apuestas</span></a>
</li>



