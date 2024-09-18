<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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

Route::get('/upload', function () {
    return view('upload');
})->middleware('auth');

Route::post('/upload', [ImageController::class, 'upload']);
