<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events\postCreated;
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
    public function postPage(){
        return view('post');
    }
    public function postData(Request $request) {
        $data=$request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

         Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
          ]);
          event(new PostCreated($data));
          
          return redirect("post")->withSuccess('added');
    }
}
