<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $filename = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->storeAs('images', $filename, 'public');

        return redirect('/upload')->with('path', $path);
    }
}
