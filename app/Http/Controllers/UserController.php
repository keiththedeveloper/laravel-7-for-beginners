<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('image')){
            $filename=$request->image->getClientOriginalName();
           $this->deleteOldImage();
            $request->image->storeAs('images',$filename,'public');
            auth()->user()->update(['avatar'=>$filename]);
        }

        return redirect()->back();
    }

    protected function deleteOldImage()
    {
        if (auth()->user()->avatar) {
            Storage::delete('/public/images/'.auth()->user()->avatar);
         }
    }
}
