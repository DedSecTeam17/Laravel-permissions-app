<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $role = Role::create(["name"=>"Author"]);
        Permission::create(["name"=>"edit_post"]);
        Permission::create(["name"=>"crate_post"]);
        Permission::create(["name"=>"delete_post"]);


        $permissions =Permission::all();

        $role->syncPermissions($permissions);
        return view('home');
    }
}
