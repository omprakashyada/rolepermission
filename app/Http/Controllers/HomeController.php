<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
// use Auth;

class HomeController extends Controller
{
    public function dashboard(){
        // $user=\Auth::user();
        //assign roles of users
        // $role=Role::where('slug','editor')->first();
        // $user->roles()->attach($role);
        //assingn permission
        // $permission=Permission::first();
        // $user->permissions()->attach($permission);
        // dd($user->hasRoles('editor'));
        // dd($user->roles);
        // dd($user->hasPermission('add-post'));
        // dd($user->can('add-post'));
        return view('dashboard');
    }
}
