<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Backend.User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('Backend.User.create', compact('roles'));
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
        $user  = User::find($id);
        $userRoles = $user->roles()->get();
        $userRole = $userRoles[0];
        $roles = Role::all();
        return view('Backend.User.edit', compact('user', 'roles', 'userRole'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users.email'.$id,
            'phone' => ['required', 'string'],
            'role' => ['required']
        ]);

        $user = User::find($id);
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->phone = $request->post('phone');
        $user->save();
        DB::table('role_user')->where('user_id', $user->id)->delete();
        $user->attachRole($request['role']);
        $request->session()->flash('alert-class', 'alert-success');

        return redirect()->route('users')->with('message', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();

        $request->session()->flash('alert-class', 'alert-danger');

        return redirect()->route('customers')->with('message', 'Customer Deleted');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $check = Hash::check($request->old_pass, $user->password);
        if($check)
        {
            $user->password = Hash::make($request->old_pass);

            $user->setRememberToken(Str::random(60));

            $user->save();
            $request->session()->flash('message', 'This is a message!');
            $request->session()->flash('alert-class', 'alert-success');
            return redirect()->back()->with('message', 'Password Changed');
        }
        else
        {
            $request->session()->flash('message', 'This is a message!');
            $request->session()->flash('alert-class', 'alert-danger');
            return redirect()->back()->with('message', 'Wrong Old Password');
        }


    }

    public function customerUpdate(Request $request)
    {
//        dd($request);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        $request->session()->flash('message', 'This is a message!');
        $request->session()->flash('alert-class', 'alert-success');

        return redirect()->back()->with('message', 'User Updated');
    }
}
