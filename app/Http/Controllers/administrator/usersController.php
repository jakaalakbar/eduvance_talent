<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->simplePaginate(15);
        return view("administrator.users.index", compact('users'));
    }
}
