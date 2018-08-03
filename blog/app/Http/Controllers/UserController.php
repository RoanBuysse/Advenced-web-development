<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;   
use App\User;
use App\Role;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Session;

class UserController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('isAdmin',['only' => ['create','edit']]);
    
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::pluck('name','id');
        return view('users.index', compact('users', 'roles'));

    }
}
