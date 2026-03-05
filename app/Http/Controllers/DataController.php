<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Inventars;
use App\Models\Darbinieks;
use App\Models\Kategorija;
use App\Models\Telpa;
use App\Models\TehniskaisStavoklis;
use App\Models\Loma;

class DataController extends Controller
{

// INVENTARS
public function showAllInventars()
{
    $inventars = DB::table('Inventars')
        ->join('Kategorija', 'Inventars.Kategorija', '=', 'Kategorija.KategorijasID')
        ->join('Telpa', 'Inventars.Telpa', '=', 'Telpa.TelpasID')
        ->join('Darbinieks', 'Inventars.Atbildigais', '=', 'Darbinieks.DarbiniekaID')
        ->join('TehniskaisStavoklis', 'Inventars.TehniskaisStavoklis', '=', 'TehniskaisStavoklis.TehniskaisStavoklisID')
        ->select(
            'Inventars.InventaraID',
            'Inventars.IUIN',
            'Kategorija.Nosaukums as Kategorija',
            'Telpa.Nosaukums as Telpa',
            'Darbinieks.LietotajaVards',
            'Darbinieks.Vards',
            'Darbinieks.Uzvards',
            'TehniskaisStavoklis.Nosaukums as TehniskaisStavoklis'
        )
        ->orderBy('Inventars.InventaraID', 'asc')
        ->paginate(8);

    return view('Inventars', compact('inventars'));
}

public function details_inventars($id) {     

    // load main record
    $inventars = Inventars::find($id);

    if (!$inventars) {
        return redirect()->back()->with('success1', 'Inventārs nav atrasts');
    }

    // load related classifiers
    $kategorija = Kategorija::find($inventars->Kategorija);
    $telpa = Telpa::find($inventars->Telpa);
    $atbildigais = Darbinieks::find($inventars->Atbildigais);
    $stavoklis = TehniskaisStavoklis::find($inventars->TehniskaisStavoklis);

    return view('detailsInventars', [
        'inventars' => $inventars,
        'kategorija' => $kategorija,
        'telpa' => $telpa,
        'atbildigais' => $atbildigais,
        'stavoklis' => $stavoklis
    ]);                                                        
}

public function newInventars(Request $dati)
{

$validation = $dati->validate([
    'IUIN' => 'required|min:3|max:10',
    'Kategorija' => 'required',
    'Telpa' => 'required',
    'Atbildigais' => 'required',
    'TehniskaisStavoklis' => 'required'
]);

$inventars = new Inventars;

$inventars->IUIN = $dati->input('IUIN');
$inventars->Kategorija = $dati->input('Kategorija');
$inventars->Telpa = $dati->input('Telpa');
$inventars->Atbildigais = $dati->input('Atbildigais');
$inventars->TehniskaisStavoklis = $dati->input('TehniskaisStavoklis');

$inventars->save();

return redirect()->to('/')->with('successp', 'Veiksmīgi pievienots jauns inventārs');

}



public function delete_inventars($id)
{

$inventars = Inventars::find($id);

if(!$inventars){
return redirect()->back()->with('success1','Inventārs nav atrasts');
}

$inventars->delete();

return redirect('/')->with('success1','Inventārs veiksmīgi izdzēsts');

}





public function editInventars($id)
{

$inventars = Inventars::find($id);

$kategorijas = DB::table('Kategorija')->get();
$telpas = DB::table('Telpa')->get();
$darbinieki = DB::table('Darbinieks')->get();
$stavokli = DB::table('TehniskaisStavoklis')->get();

return view('editInventars',[
'inventars'=>$inventars,
'kategorijas'=>$kategorijas,
'telpas'=>$telpas,
'darbinieki'=>$darbinieki,
'stavokli'=>$stavokli
]);

}



public function updateInventars(Request $dati,$id)
{

$inventars = Inventars::find($id);

$inventars->IUIN = $dati->input('IUIN');
$inventars->Kategorija = $dati->input('Kategorija');
$inventars->Telpa = $dati->input('Telpa');
$inventars->Atbildigais = $dati->input('Atbildigais');
$inventars->TehniskaisStavoklis = $dati->input('TehniskaisStavoklis');

$inventars->save();

return redirect('/')->with('successp','Inventārs veiksmīgi rediģēts');

}

    //     public function showAllDarbinieki()
    // {
    //     $darbinieki = Darbinieks::orderBy('DarbiniekaID', 'asc')->get();
    //     // return view('allDarbinieki', ['darbinieki' => $darbinieki]);
    //     return view('Darbinieki', ['darbinieki' => DB::table('Darbinieks')->orderBy('DarbiniekaID', 'asc')->paginate(4)]);
    // }

public function showAllDarbinieki()
{
    $darbinieki = DB::table('Darbinieks')
        ->join('Loma', 'Darbinieks.Loma', '=', 'Loma.LomaID')
        ->select(
            'Darbinieks.DarbiniekaID',
            'Darbinieks.Vards',
            'Darbinieks.Uzvards',
            'Darbinieks.LietotajaVards',
            'Darbinieks.Email',
            'Loma.Nosaukums as Loma'
        )
        ->orderBy('Darbinieks.DarbiniekaID', 'asc')
        ->paginate(8);

    return view('Darbinieki', compact('darbinieki'));
}







public function newDarbinieks(Request $dati)
{

$darbinieks = new Darbinieks;

$darbinieks->Vards = $dati->input('Vards');
$darbinieks->Uzvards = $dati->input('Uzvards');
$darbinieks->LietotajaVards = $dati->input('LietotajaVards');
$darbinieks->Email = $dati->input('Email');
$darbinieks->Parole = bcrypt($dati->input('Parole'));
$darbinieks->Loma = $dati->input('Loma');

$darbinieks->save();

return redirect('/Darbinieki')->with('successp','Darbinieks pievienots');

}


public function editDarbinieks($id)
{

$darbinieks = Darbinieks::find($id);
$lomas = DB::table('Loma')->get();

return view('editDarbinieks',[
'darbinieks'=>$darbinieks,
'lomas'=>$lomas
]);

}

public function updateDarbinieks(Request $dati,$id)
{

$darbinieks = Darbinieks::find($id);

$darbinieks->Vards = $dati->input('Vards');
$darbinieks->Uzvards = $dati->input('Uzvards');
$darbinieks->LietotajaVards = $dati->input('LietotajaVards');
$darbinieks->Email = $dati->input('Email');
$darbinieks->Loma = $dati->input('Loma');

$darbinieks->save();

return redirect('/Darbinieki')->with('successp','Darbinieks rediģēts');

}


public function deleteDarbinieks($id)
{

$darbinieks = Darbinieks::find($id);

if(!$darbinieks){
return redirect()->back()->with('success1','Darbinieks nav atrasts');
}

$darbinieks->delete();

return redirect('/Darbinieki')->with('success1','Darbinieks veiksmīgi izdzēsts');

}

public function details_darbinieks($id)
{

$darbinieks = Darbinieks::find($id);

if(!$darbinieks){
return redirect()->back()->with('success1','Darbinieks nav atrasts');
}

$loma = Loma::find($darbinieks->Loma);

return view('detailsDarbinieks',[
'darbinieks'=>$darbinieks,
'loma'=>$loma
]);

}

}

