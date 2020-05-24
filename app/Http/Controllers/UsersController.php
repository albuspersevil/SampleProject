<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Roles;
use Auth;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $users =  $user->getUsers();
       return view('users')->with("users",$users);

    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
  }

    public function default()
    {
       return view('default');

    }

    public function profile()
    {
        $user = new User();
        $users =  $user->getUsers();
       return view('profile');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('addnewemployee');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user = new User();
      $user->firstname    = $request->firstname;
      $user->lastname     = $request->lastname;
      $user->username     = $request->username;
      $user->email        = $request->email;
      $user->department   = $request->department;
      $user->password     = 'CrmDesk#101';
      $user->status =1;
      $user->deleted =0;
     $user->save();

      $roles = Roles::find([3]);
      DB::table('user_roles')->insert(
                 array(
                         'user_id'  =>$user->id,
                         'role_id'  =>$request->role_id,
                         'deleted' =>0,
                          'created_at' =>NOW(),
                          'updated_at' =>NOW()
                 )
        );

      //print_r($roles); die;
    //  $roles->users()->attach($user);

      return redirect('/users')->with('success', 'You are successfully logged in');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
      $cats = cats::find($id);
 $cats->delete();
 return response(['Message' => 'This request has been deleted'], 200);
    }
}
