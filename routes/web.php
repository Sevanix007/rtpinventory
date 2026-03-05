<?php

use Illuminate\Support\Facades\Route;



// ----------------NAVIGATION-------------------- //
Route::get('/', 'App\Http\Controllers\DataController@showAllInventars')->middleware('auth');
Route::get('/Darbinieki', 'App\Http\Controllers\DataController@showAllDarbinieki')->middleware('auth');




// ----------------AUTH-------------------- //
Route::get('/login', function () {
    return view('login');
})->name('login');

// Route::get('/register', function (){
//     return view('register');
// });
route::get('/logout', function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
 
})->name('logout');
Route::post('/loginSubmit', 'App\Http\Controllers\AuthController@login');
// Route::post('/registerSubmit', 'App\Http\Controllers\AuthController@register');

// ----------------DETAILS-------------------- //


Route::get('/inventars/{id}/details', 'App\Http\Controllers\DataController@details_inventars')->name('inventars-details')->middleware('auth');


// ----------------DELETE-------------------- //
Route::get('/inventars/{id}/delete', 'App\Http\Controllers\DataController@delete_inventars')->middleware('auth');


// ----------------ADD-------------------- //

Route::get('/inventars/addInventars', function () {

    $kategorijas = DB::table('Kategorija')->get();
    $telpas = DB::table('Telpa')->get();
    $darbinieki = DB::table('Darbinieks')->get();
    $stavokli = DB::table('TehniskaisStavoklis')->get();

    return view('addInventars', compact(
        'kategorijas',
        'telpas',
        'darbinieki',
        'stavokli'
    ));

})->middleware('auth');


Route::post('/inventars/newInventars', 'App\Http\Controllers\DataController@newInventars')->middleware('auth');




Route::get('/Darbinieki/addDarbinieks', function(){

$lomas = DB::table('Loma')->get();

return view('addDarbinieks',compact('lomas'));

})->middleware('auth');



Route::post('/darbinieki/newDarbinieks',
'App\Http\Controllers\DataController@newDarbinieks')->middleware('auth');


// ----------------edit-------------------- //


Route::get('/darbinieki/{id}/edit',
'App\Http\Controllers\DataController@editDarbinieks')->middleware('auth');

Route::post('/darbinieki/{id}/update',
'App\Http\Controllers\DataController@updateDarbinieks')->middleware('auth');



Route::get('/inventars/{id}/edit', 'App\Http\Controllers\DataController@editInventars')->middleware('auth');

Route::post('/inventars/{id}/update', 'App\Http\Controllers\DataController@updateInventars')->middleware('auth');






// DETAILS
Route::get('/darbinieki/{id}/details',
'App\Http\Controllers\DataController@details_darbinieks')->middleware('auth');

// DELETE
Route::get('/darbinieki/{id}/delete',
'App\Http\Controllers\DataController@deleteDarbinieks')->middleware('auth');






