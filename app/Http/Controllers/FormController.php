<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function postform(Request $request) {
        $user = $request->input('username');
        $addr = $request->input('alamat');
        $pwd = $request->input('password');
        return view('submit', [
            'username' => $user,
            'alamat' => $addr,
            'password' => $pwd
        ]);
    }

    public function formpost(Request $request) {
        if($request->isMethod('post')){    
            $user = $request->input('nama');
            $email = $request->input('email');
            
            return view('formpost', [
                'nama' => $user,
                'email' => $email
            ]);
        }

        return view('formpost');
    }
}
