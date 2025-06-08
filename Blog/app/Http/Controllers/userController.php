<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //create a new User
     public function create(Request $request){
        $user  = new User();
        $user->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,

        ]);
        return redirect('/admin/users');
    }
    //delete an existing user
    public function del_user(Request $request){
        $user  = new User();
        $user = $user->find($request->id);
        $user->delete();
        return redirect('/admin/users');
    }

    //login function
    public function login(Request $request){

        $data = [
            'email'    => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($data)){
            return redirect('/admin');

        }else {
            return redirect('/login')->with('error' , 'email or password is incorrect ');



    }
    }

    //logout function
    public function logout(Request $request){

        Auth::logout();
        return redirect('/login');

    }


}

