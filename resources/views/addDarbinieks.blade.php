@extends('layouts.base')

@section('title')
Pievienot darbinieku
@endsection

@section('heading-nosaukums')
Jauna darbinieka pievienošana
@endsection

@section('content')

<form action="/darbinieki/newDarbinieks" method="post">

@csrf

<div class="mb-3">
<label class="form-label">Vārds</label>
<input type="text" name="Vards" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Uzvārds</label>
<input type="text" name="Uzvards" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Lietotājvārds</label>
<input type="text" name="LietotajaVards" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="Email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Parole</label>
<input type="password" name="Parole" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Loma</label>

<select name="Loma" class="form-control">

@foreach($lomas as $l)

<option value="{{ $l->LomaID }}">
{{ $l->Nosaukums }}
</option>

@endforeach

</select>

</div>

<button class="btn btn-success">Saglabāt</button>

</form>

@endsection