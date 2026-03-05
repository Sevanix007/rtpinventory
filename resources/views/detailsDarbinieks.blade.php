@extends('layouts.base')

@section('content')

<h1>Darbinieks - Detalizēti</h1>
<br>

<div class="alert alert-info">

<h4>
ID: {{ $darbinieks->DarbiniekaID }} |
Lietotājvārds: {{ $darbinieks->LietotajaVards }}
</h4>

<p><b>Vārds:</b>

{{ $darbinieks->Vards }}

</p>


<p><b>Uzvārds:</b>

{{ $darbinieks->Uzvards }}

</p>


<p><b>Email:</b>

{{ $darbinieks->Email }}

</p>


<p><b>Loma:</b>

@if($loma)

{{ $loma->Nosaukums }}

@else

{{ $darbinieks->Loma }}

@endif

</p>


<a class="btn btn-danger" href="/darbinieki/{{ $darbinieks->DarbiniekaID }}/delete" onclick="return confirm('Vai tiešām vēlaties dzēst šo darbinieku?')">
Dzēst
</a>

<a class="btn btn-warning" href="/darbinieki/{{ $darbinieks->DarbiniekaID }}/edit">
Rediģēt
</a>

</div>


@if(session('success1'))

<div class="alert alert-success">

{{ session('success1') }}

</div>

@endif

@endsection