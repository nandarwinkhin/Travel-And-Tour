<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\UserRegisterFormRequest;
use App\Http\Requests\OrgRegisterFormRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/welcome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone'=>$data['phone'],
            'gender'=>$data['gender'],
            'type_id'=>$data['type_id'],
            'address'=>$data['address'],
        ]);
    }

    public function showRegister(){
        return view('register');
    }

    public function storeUser(UserRegisterFormRequest $request)
    {
        
        $name=$request->get('name');
        $email=$request->get('email');
        $phone=$request->get('phone');
        $gender=$request->get('gender');
        $password=$request->get('password');
        $password_confirm=$request->get('password_confirm');
        //$type_id=$request->get('type_id');

        $photo=$request->file('ImageForUser');
        $filename=uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path().'/uploades/',$filename);
        
            $user=new User;
            $user->name=$name;
            $user->email=$email;
            $user->phone=$phone;
            $user->gender=$gender;
            $user->address=null;
            $user->password=$password;
            $user->type_id=1;
            // $user->type_id=$type_id;
            $user->photo=$filename;
            $user->remember_token = $request->get ( '_token' );
            $user->save();

            return redirect('login')->with(array('status'=>'You are now registerd','user'=>$user));
        //     $TempData["status"] = "You are now registerd";
        //     $TempData["user"]=$user;
        // return new RedirectResult('wlcome');
    }

    public function storeOrg(OrgRegisterFormRequest $request)
    {
        
        $name=$request->get('name');
        $email=$request->get('email');
        $phone=$request->get('phone');
        $address=$request->get('address');
        $password=$request->get('password');
        $password_confirm=$request->get('password_confirm');
        $gender=$request->get('gender');
        $photo=$request->file('ImageForOrg');
        $filename=uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path().'/uploades/',$filename);

            $user=new User;
            $user->name=$name;
            $user->email=$email;
            $user->phone=$phone;
            $user->address=$address;
            $user->gender=null;
            $user->password=$password;
            $user->type_id=2;
            $user->photo=$filename;
            $user->remember_token = $request->get ( '_token' );
            $user->save();

            return redirect('login')->with(array('status'=>'You are now registerd','user'=>$user));
        //     $TempData["status"] = "You are now registerd";
        //     $TempData["user"]=$user;
        // return new RedirectResult('wlcome');
    }
}
