@extends('layouts.base')

@section('title')
Inventars
@endsection

@section('heading-nosaukums')
Inventāra uzskaite
@endsection

@section('content')


<br>
<!-- <pre> -->
<!-- {{ print_r(session()->all(), true) }} -->
  <!-- печатает все жлементы сессии!!!!! -->
<!-- </pre> -->


<a href="/inventars/addInventars" class="btn btn-primary">Pievienot jaunu inventaru</a>

<br><br>

<table class="table table-bordered border-primary">

<tr>
    <th class="m">InventaraID</th>
    <th class="m">IUIN</th>
    <th class="m">Kategorija</th>
    <th class="m">Telpa</th>
    <th class="m">Atbildigais</th>
    <th class="m">TehniskaisStavoklis</th>
    <th class="m">Darbibas</th>
</tr>

@foreach($inventars as $el)

<tr>

<td class="m">{{ $el->InventaraID }}</td>
<td class="m">{{ $el->IUIN }}</td>
<td class="m">{{ $el->Kategorija }}</td>
<td class="m">{{ $el->Telpa }}</td>
<td class="m"> {{ $el->Vards }} {{ $el->Uzvards }}</td>
<td class="m">{{ $el->TehniskaisStavoklis }}</td>

<td class="m">

<a class="a-edit" href="/inventars/{{ $el->InventaraID }}/edit"><i class="bi bi-pen-fill"></i> Redigēt</a>
<a class="a-delete" href="/inventars/{{ $el->InventaraID }}/delete" onclick="return confirm('Vai tiešām vēlaties dzēst šo inventāru?')"><i class="bi bi-trash-fill"></i>Dzēst</a>
<a class="a-details" href="/inventars/{{ $el->InventaraID }}/details" ><i class="bi bi-eye-fill" ></i> Detalizēt</a>

</td>

</tr>

@endforeach

</table>

{{ $inventars->links('pagination::bootstrap-5') }}

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