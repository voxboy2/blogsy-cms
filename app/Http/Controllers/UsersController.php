<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Session;
use App\User;
use App\Profile;
use Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }


    public function makeAdmin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        session()->flash('success', 'User made admin successfully');
        

        return redirect(route('users.index'));
    }


    public function logout(Request $request){
            Auth::guard()->logout();
            $request->session()->invalidate();
            return redirect('/');
    }


    public function not_admin($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Succesfully changed user permissions');

        return redirect()->back();

    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store (Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'admin' => 0,
            'password' => bcrypt('password')
        ]);


        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'storage/avatars/avatar.png',


        ]);

        Session::flash('success', 'User added successfully');

        return redirect()->route('users.index');


    }


    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        Session::flash('success', 'User deleted');

        return redirect()->back();
    }
}
