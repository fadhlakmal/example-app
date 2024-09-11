<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function postform(Request $request) {
        $user = $request->input('username');
        $addr = $request->input('alamat');
        $pwd = $request->input('password');
        return 'Nama : '.$user.'<br/> Alamat : '.$addr.'<br/> Password : '.$pwd;
    }
}
