@extends('layouts.base')

@section('content')

<h1>Inventārs - Detalizēti</h1>
<br>

<div class="alert alert-info">

<h4>
ID: {{ $inventars->InventaraID }} |
IUIN: {{ $inventars->IUIN }}
</h4>

<p><b>Kategorija:</b>

@if($kategorija)
{{ $kategorija->Nosaukums }}
@else
{{ $inventars->Kategorija }}
@endif

</p>


<p><b>Telpa:</b>

@if($telpa)
{{ $telpa->Nosaukums }}
@endif

</p>


<p><b>Atbildīgais:</b>

@if($atbildigais)

{{ $atbildigais->Vards }} 
{{ $atbildigais->Uzvards }} 
(ID: {{ $atbildigais->DarbiniekaID }})

@else

{{ $inventars->Atbildigais }}

@endif

</p>


<p><b>Tehniskais stāvoklis:</b>

@if($stavoklis)

{{ $stavoklis->Nosaukums }}

@else

{{ $inventars->TehniskaisStavoklis }}

@endif

</p>


<a class="btn btn-danger" href="/inventars/{{ $inventars->InventaraID }}/delete">Dzēst</a>

<a class="btn btn-warning" href="/inventars/{{ $inventars->InventaraID }}/edit">
Rediģēt
</a>

</div>


@if(session('success1'))

<div class="alert alert-success">

{{ session('success1') }}

</div>

@endif

@endsection