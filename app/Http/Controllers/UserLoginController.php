<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginFormRequest;


class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userLogin(LoginFormRequest $request){
        $user=User::where('email','=',$request->email)
                ->where('password','=',$request->password)->get()->first();
        View::share('user', $user);
        return redirect('welcome/'.$user->id.'')->with(array('status'=>'You are now registerd','user'=>$user));
    }

    //API
    public function createUser(Request $requests){
        try{
            //$user = User::create($requests->all());
        $user=new User;
            $user->name=$requests->name;
            $user->email=$requests->email;
            $user->phone=$requests->phone;
            $user->address=$requests->address;
            $user->gender=$requests->gender;
            $user->password=Hash::make($requests->password);
            $user->type_id=$requests->type_id;
            $user->photo=$requests->photo;
        //     // $user->remember_token=$requests->remember_token;
            $user->save();
            $response["users"] = $user;
            $response["status"] = "success";
        }
        catch(QueryException $e){
            $response["status"]="REgistration Failed! May be your email or phone is duplicate!";
            $response["error"]=$e;
        }
        //     $user->save();
            
        return response()->json($response);
    }

    public function selectUser(){
        $users  = User::all()->sortBy('created_at');
        $response["users"] = $users;
        // $response["id"] = $users->id;
        // $response["name"] = $users->name;
        // $response["email"] = $users->email;
        // $response["phone"] = $users->phone;
        // $response["address"] = $users->address;
        // $response["gender"] = $users->gender;
        // $response["password"] = $users->password;
        // $response["photo"] = $users->photo;
        // $response["user_type"] = $users->user_type;
        // $response["remember_token"] = $users->remember_token;
        // $response["created_at"] = $users->created_at;
        // $response["updated_at"] = $users->updated_at;
        return response()->json($response);
    }

    public function updateUser(Request $requests, $id){
        $user  = User::where('id',$id)->get();
           $user->name = $requests->name;
           $user->email = $requests->email;
           $user->phone = $requests->phone;
           $user->address = $requests->address;
           $user->gender = $requests->gender;
           $user->password =Hash::make( $requests->password);
           $user->photo = $requests->photo;
           $user->user_type = $requests->user_type;
           $user->save();
           $response["users"] = $user;
        return response()->json($response);
    }  

    public function deleteUser($id){
        $user=User::where('id',$id)->delete();
        return response()->json('Removed successfully.');
    }

    public function login(Request $requests){
        try{
        $user=User::where('email','=',$requests->email)
                ->where('password','=',Hash::make($requests->password))->get()->first();
        $response['status']="Login success!";
        $response['user']=$user;
        }
        catch(QueryException $e){
            $response["status"]="Login Failed!";
            $response["error"]=$e;
        }
        return response()->json($response);
    }


}
