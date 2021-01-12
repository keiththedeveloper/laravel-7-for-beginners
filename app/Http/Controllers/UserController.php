<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $data=[
            'name'=>'Keith'
        ];
        return view('home');
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'Image Uploaded.'); // success message
        }
        return redirect()->back()->with('error', 'Image not Uploaded.'); // error message
    }

}
