<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use App\Traits\RolesTrait;

class UserController extends Controller
{
    use RolesTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::with(['roles','permissions'])->get();
        // dd($users);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // foreach ($request->get('roles') as $role) {
            
        // }
        // dd($request->get('roles'));

        $validatedData = $request->validate([
            'Username' => 'required|unique:users',
            'Password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);
    
        $user = new User;
        $user->username = $request->get('Username');
        $user->password = bcrypt($request->get('Password'));
        $user->save();
        if (!$user) {
            return view('users.create')->with('error', trans('messages.error'));
        }

        $this->giveRole($user, $request->get('roles'));

        return redirect('users')->with('success', trans('messages.success_creating_user'));  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
