<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile(){

      return view('user/profile', array('user' => Auth::user()));

    }

    public function updateAvatar(Request $request){
      //Mètode que s'encarrega d'actualitzar l'imatge de perfil

      if($request->hasFile('avatar')){
        dd($request->avatar);
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/' . $filename));

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
      }

      return view('user/profile', array('user' => Auth::user()));

    }
}
