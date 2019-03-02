<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'Username' => 'required|unique:users',
            'Password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);
    
        
        $user = new User;
        $user->username = $request->get('Username');
        $user->password = bcrypt($request->get('Password'));
        $user->save();
        if ($user) {
            return redirect('users')->with('success_message', trans('messages.success_creating_user'));
        }
        return view('users.create')->with('error_message', trans('messages.error'));
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
