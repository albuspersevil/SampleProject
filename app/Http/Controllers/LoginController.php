<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class LoginController extends Controller
{
    public function Login()
    {
    	return view('userlogin');
    }

    public function Loginuser(Request $request)
    {
    	 $userdata = array(
        'email'     => $request->get('email'),
        'password'  => $request->get('password')
    );

    // attempt to do the login
    if (Auth::attempt($userdata)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        $userdata = User::getuserData();
        //dd($data);
        return view('userinfo',compact('userdata'));

    } else {        

        // validation not successful, send back to form 
        return Redirect::to('login')->with('message','Please Enter Valid Email and Password.');

    }
    }

    public function logout(Request $request) 
    {
      Auth::logout();
      return redirect('/login');
    }
}
