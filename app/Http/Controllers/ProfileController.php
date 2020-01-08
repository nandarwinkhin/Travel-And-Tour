<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\requests\UpdateProfileFormRequest;

class ProfileController extends Controller
{
    public function showProfile(){
        return view('profile');
    }

    public function updateProfile(UpdateProfileFormRequest $request){
        $user  = User::where('id',Auth::user()->id)->get()->first();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->phone = $request->phone;
           $user->address = $request->address;
           $user->save();
        return redirect('/welcome');
    }

    public function showOthersProfile($user_id){
        $user  = User::where('id',$user_id)->get()->first();
        return view('others_profile')->with('user',$user);
    }
}
