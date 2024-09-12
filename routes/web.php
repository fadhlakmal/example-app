<?php

use App\Http\Controllers\FormController;
use Illuminate\Http\Request; 
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

// Route::get('/formpost', function () {
//     return view('formpost');
// });

Route::match(['get', 'post'],'/formpost', [FormController::class, 'formpost']);

// Route::post('/submitpost', [FormController::class, 'formpost']);

// Route::post('/submitpost', function (Request $request) {
//     $user = $request->input('nama');
//     $email = $request->input('email');

//     return view('submitpost', [
//         'nama' => $user,
//         'email' => $email
//     ]);
// });