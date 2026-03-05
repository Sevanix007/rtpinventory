@extends('layouts.base')

@section('title')
Darbinieki
@endsection

@section('heading-nosaukums')
Darbinieku saraksts
@endsection

@section('content')

<br>

<a href="/Darbinieki/addDarbinieks" class="btn btn-primary">Pievienot jaunu darbinieku</a>

<br><br>

<table class="table table-bordered border-primary">

<tr>
    <th class="m">DarbiniekaID</th>
    <th class="m">Vārds</th>
    <th class="m">Uzvārds</th>
    <th class="m">Lietotājvārds</th>
    <th class="m">Email</th>
    <th class="m">Loma</th>
    <th class="m">Darbības</th>
</tr>

@foreach($darbinieki as $el)

<tr>

<td class="m">{{ $el->DarbiniekaID }}</td>
<td class="m">{{ $el->Vards }}</td>
<td class="m">{{ $el->Uzvards }}</td>
<td class="m">{{ $el->LietotajaVards }}</td>
<td class="m">{{ $el->Email }}</td>
<td class="m">{{ $el->Loma }}</td>

<td class="m">

<a class="a-edit" href="/darbinieki/{{ $el->DarbiniekaID }}/edit">
<i class="bi bi-pen-fill"></i> Rediģēt
</a>

<a class="a-delete"
href="/darbinieki/{{ $el->DarbiniekaID }}/delete"
onclick="return confirm('Vai tiešām vēlaties dzēst šo darbinieku?')">
<i class="bi bi-trash-fill"></i> Dzēst
</a>

<a class="a-details"
href="/darbinieki/{{ $el->DarbiniekaID }}/details">
<i class="bi bi-eye-fill"></i> Detalizēti
</a>

</td>

</tr>

@endforeach

</table>

{{ $darbinieki->links('pagination::bootstrap-5') }}

@if(session('success1'))
<div class="alert alert-danger">
{{ session('success1') }}
</div>
@endif

@if(session('successp'))
<div class="alert alert-info">
{{ session('successp') }}
</div>
@endif

@endsection