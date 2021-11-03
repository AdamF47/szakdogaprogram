<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coordinator;
use Illuminate\Support\Facades\Auth;

class CoordinatorController extends Controller
{
    function create(Request $request){
        //Validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:coordinators,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
         ]);

         $coordinator = new Coordinator();
         $coordinator->name = $request->name;
         $coordinator->email = $request->email;
         $coordinator->password = \Hash::make($request->password);
         $save = $coordinator->save();

         if( $save ){
             return redirect()->back()->with('success','You are now registered successfully as Coordinator');
         }else{
             return redirect()->back()->with('fail','Something went Wrong, failed to register');
         }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:coordinators,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in coordinators table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('coordinator')->attempt($creds) ){
            return redirect()->route('coordinator.home');
        }else{
            return redirect()->route('coordinator.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('coordinator')->logout();
        return redirect('/');
    }
}
