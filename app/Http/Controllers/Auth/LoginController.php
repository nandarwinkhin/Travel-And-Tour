<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

 use App\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Request;
// use DB;

// use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{

    public function showLogin(){
        return view('login');
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    // public function login(LoginFormRequest $request){
    //     $email=$request->get('email');
    //     $password=$request->get('password');
    //     $hashpassword=Hash::make($password);
        
    //     $user=User::where('email','=',$email)
    //                 ->where('password','=',$hashpassword)
    //                 ->get();

    //     return redirect('welcome')->with('user',$user);

    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
