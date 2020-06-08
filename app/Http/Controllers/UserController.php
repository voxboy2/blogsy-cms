<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index () {
        $users = DB::table('users')->get();


        return view('home', ['users'=> $users]);
    }


    
}

 
$users = DB::table('users')
->orderBy('name', 'desc')
->get();

// we use the order by to sort giving methods of a coloumn

$users = DB::table('users')
->latest()
->first();

// we use the latest  and oldest methods to sort results by date

$users = DB::table('users')
->groupBy('account_id')
->having('account_id', '>', 100)
->get();