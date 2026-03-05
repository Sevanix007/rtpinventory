@extends ('layouts.base')

@section('content')

<h1>Rediģēt inventāru</h1>

<form action="/inventars/{{ $inventars->InventaraID }}/update" method="post">

@csrf

<div class="container" style="max-width:60%">

<div class="mb-3">

<label>IUIN</label>

<input type="text" class="form-control" name="IUIN" value="{{ $inventars->IUIN }}">

</div>


<div class="mb-3">

<label>Kategorija</label>

<select class="form-control" name="Kategorija">

@foreach($kategorijas as $k)

<option value="{{ $k->KategorijasID }}"
@if($inventars->Kategorija == $k->KategorijasID) selected @endif>

{{ $k->Nosaukums }}

</option>

@endforeach

</select>

</div>


<div class="mb-3">

<label>Telpa</label>

<select class="form-control" name="Telpa">

@foreach($telpas as $t)

<option value="{{ $t->TelpasID }}"
@if($inventars->Telpa == $t->TelpasID) selected @endif>

{{ $t->Nosaukums }}

</option>

@endforeach

</select>

</div>


<div class="mb-3">

<label>Atbildīgais</label>

<select class="form-control" name="Atbildigais">

@foreach($darbinieki as $d)

<option value="{{ $d->DarbiniekaID }}"
@if($inventars->Atbildigais == $d->DarbiniekaID) selected @endif>

{{ $d->Vards }} {{ $d->Uzvards }}

</option>

@endforeach

</select>

</div>


<div class="mb-3">

<label>Tehniskais stāvoklis</label>

<select class="form-control" name="TehniskaisStavoklis">

@foreach($stavokli as $s)

<option value="{{ $s->TehniskaisStavoklisID }}"
@if($inventars->TehniskaisStavoklis == $s->TehniskaisStavoklisID) selected @endif>

{{ $s->Nosaukums }}

</option>

@endforeach

</select>

</div>


<button type="submit" class="btn btn-warning">

Saglabāt izmaiņas

</button>

</div>

</form>

@endsection