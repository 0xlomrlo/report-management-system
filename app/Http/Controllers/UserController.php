<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Traits\RolesTrait;
use Spatie\Permission\Models\Role;
use DB;

class UserController extends Controller
{
    use RolesTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::orderBy('id')->with(['roles','permissions'])->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);
        $input = [
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'roles' => $request->get('roles'),
        ];
        $user = User::create($input);
        if (!$user) {
            return view('users.create')->with('error', trans('messages.error'));
        }
        $this->giveRole($user, $input['roles']);

        return redirect('users')->with('success', trans('messages.success_creating_user'));  
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     // 'Username' => 'required|unique:users,username'.$id, 
        //     // 'Password' => 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        // ]);
        $input = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'roles' => $request->get('roles'),
        ];
        if(!empty($input['password'])){ 
            $input['password'] = bcrypt($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::findOrFail($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $this->giveRole($user, $input['roles']);

        return redirect()->route('users.index')->with('success',trans('messages.success_updating_user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->hasRole('admin')){
            return redirect()->back()->with('error', trans('messages.error_deleting_admin'));
        }else{
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->delete();
        }
        return redirect()->back()->with('success', trans('messages.success_deleting_user')); 
    }
}
