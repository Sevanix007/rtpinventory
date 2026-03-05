@extends ('layouts.base')

@section('content')

<h1>Pievienot jaunu inventāru</h1>

@if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $kluda)
<li>{{ $kluda }}</li>
@endforeach
</ul>
</div>
@endif

<form action="/inventars/newInventars" method="post">
@csrf

<div class="container" style="max-width: 60%;">

<div class="mb-3">
<label class="form-label">IUIN</label>
<input type="text" class="form-control" name="IUIN" value="INV">
</div>


<div class="mb-3">
<label class="form-label">Kategorija</label>

<select class="form-control" name="Kategorija">

@foreach($kategorijas as $k)

<option value="{{ $k->KategorijasID }}">
{{ $k->Nosaukums }}
</option>

@endforeach

</select>

</div>


<div class="mb-3">
<label class="form-label">Telpa</label>

<select class="form-control" name="Telpa">

@foreach($telpas as $t)

<option value="{{ $t->TelpasID }}">
{{ $t->Nosaukums }}
</option>

@endforeach

</select>

</div>


<div class="mb-3">
<label class="form-label">Atbildīgais</label>

<select class="form-control" name="Atbildigais">

@foreach($darbinieki as $d)

<option value="{{ $d->DarbiniekaID }}">
{{ $d->Vards }} {{ $d->Uzvards }}
</option>

@endforeach

</select>

</div>


<div class="mb-3">
<label class="form-label">Tehniskais stāvoklis</label>

<select class="form-control" name="TehniskaisStavoklis">

@foreach($stavokli as $s)

<option value="{{ $s->TehniskaisStavoklisID }}">
{{ $s->Nosaukums }}
</option>

@endforeach

</select>

</div>


<button type="submit" class="btn btn-info">Pievienot</button>

</div>
</form>

@endsection