<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/submit', [FormController::class, 'postform']);

Route::get('users/{id}/{nama?}', function ($id, $nama='tamu') {
    echo 'id: '.$id.' nama: '.$nama;
});

Route::get('/formget', function () {
    return view('formget');
});
