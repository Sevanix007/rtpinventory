<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Darbinieks;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{


public function getAuthPassword()
{
    return $this->Parole;
}
   public function register(Request $request)
    {
        $request->validate([
            'uzvards' => 'required',
            'vards' => 'required',
            'epasts' => 'required|email|unique:darbinieks,Email',
            'lvards' => 'required|unique:darbinieks,LietotajaVards',
            'parole' => 'required|min:6',
        ]);

        $darbinieks = Darbinieks::create([
            'Vards' => $request->input('vards'),
            'Uzvards' => $request->input('uzvards'),
            'Email' => $request->input('epasts'),
            'LietotajaVards' => $request->input('lvards'),
            'Parole' => Hash::make($request->input('parole')),
        ]);

        return redirect('/login')->with('success', 'Reģistrācija veiksmīga! Tagad varat pieteikties.');
}

public function login(Request $request)
    {
        // If your login form uses 'login_email' and 'login_password' as input names,
        // validate those and map to the credentials array used by Auth::attempt.
        $request->validate([
            'login_name' => 'required',
            'login_password' => 'required',
        ]);

$credentials = [
    'LietotajaVards' => $request->input('login_name'),
    'password' => $request->input('login_password'),
];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

    $role = DB::table('Loma')
        ->where('LomaID', Auth::user()->Loma)
        ->value('Nosaukums');

    session([
        'role' => $role,
    ]);
            return redirect()->intended('/register'); // Redirect to intended page or home
        }






        return back()->withErrors([
            'login_name' => 'Nepareiza parole vai lietotājvārds!',
        ])->onlyInput('login_name');
    }
}
