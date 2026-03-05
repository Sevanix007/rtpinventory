@extends('layouts.base')

@section('title')
Rediģēt darbinieku
@endsection

@section('heading-nosaukums')
Darbinieka rediģēšana
@endsection

@section('content')

<form action="/darbinieki/{{ $darbinieks->DarbiniekaID }}/update" method="post">

@csrf

<div class="mb-3">
<label class="form-label">Vārds</label>
<input type="text" name="Vards" class="form-control" value="{{ $darbinieks->Vards }}">
</div>

<div class="mb-3">
<label class="form-label">Uzvārds</label>
<input type="text" name="Uzvards" class="form-control" value="{{ $darbinieks->Uzvards }}">
</div>

<div class="mb-3">
<label class="form-label">Lietotājvārds</label>
<input type="text" name="LietotajaVards" class="form-control" value="{{ $darbinieks->LietotajaVards }}">
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="Email" class="form-control" value="{{ $darbinieks->Email }}">
</div>

<div class="mb-3">
<label class="form-label">Loma</label>

<select name="Loma" class="form-control">

@foreach($lomas as $l)

<option value="{{ $l->LomaID }}"
{{ $darbinieks->Loma == $l->LomaID ? 'selected' : '' }}>
{{ $l->Nosaukums }}
</option>

@endforeach

</select>

</div>

<button class="btn btn-success">Saglabāt</button>

</form>

@endsection