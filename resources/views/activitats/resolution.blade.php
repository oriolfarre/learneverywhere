

@foreach ($compare as $comp)
    @if ($comp->correcte == 'si')
        <p style="color: green;">Correcto</p>
    
    @elseif($comp->correcte == 'no')
    <p style="color: red;">Incorrecto</p>
    @endif

@endforeach


<a href="activitats">Tornar al llistat de preguntes</a>