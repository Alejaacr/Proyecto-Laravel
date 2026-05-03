<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CitaController;

/* LOGIN */
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {

    $users = [
        'deivid' => '1234',
        'sebastian' => '1234',
        'alejandra' => '1234'
    ];

    $usuario = $request->input('usuario');
    $pass = $request->input('pass');

    if(isset($users[$usuario]) && $users[$usuario] === $pass){
        session(['user' => $usuario]);
        return redirect('/');
    }

    return back()->with('error', 'Credenciales incorrectas');
});

/* LOGOUT */
Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});

/* PROTEGER SISTEMA */
Route::get('/', function () {
    if(!session('user')){
        return redirect('/login');
    }
    return app(CitaController::class)->index();
});

/* CRUD COMPLETO */
Route::post('/citas', [CitaController::class, 'store']);
Route::get('/citas/{id}/edit', [CitaController::class, 'edit']);
Route::put('/citas/{id}', [CitaController::class, 'update']);
Route::delete('/citas/{id}', [CitaController::class, 'destroy']);

/* OPCIONAL RAPIDO */
Route::get('/rapido', function () {
    return view('rapido');
});
