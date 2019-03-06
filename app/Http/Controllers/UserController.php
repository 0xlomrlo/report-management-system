<?php

namespace App\Http\Controllers;

use App\Group;
use App\Traits\RolesAndGroupsTrait;
use App\User;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use RolesAndGroupsTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('id')->with(['roles', 'permissions'])->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $groups = Group::all();

        return view('users.create', compact('roles', 'groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}.*$/',
        ]);
        $input = [
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'roles' => $request->get('roles'),
            'groups' => $request->get('groups'),

        ];
        $user = User::create($input);
        if (!$user) {
            return view('users.create')->with('error', trans('messages.error'));
        }
        $this->giveRole($user, $input['roles']);
        $this->giveGroup($user, $input['groups']);

        return redirect('users')->with('success', trans('messages.success_create'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $groups = Group::all();

        return view('users.edit', compact('user', 'roles', 'groups'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}.*$/',
        ]);
        $input = [
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'roles' => $request->get('roles'),
            'groups' => $request->get('groups'),

        ];

        if (!empty($input['password'])) {
            $input['password'] = bcrypt($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('group_user')->where('user_id', $id)->delete();
        $this->giveRole($user, $input['roles']);
        $this->giveGroup($user, $input['groups']);

        return redirect()->route('users.index')->with('success', trans('messages.success_update'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->hasRole('admin')) {
            return redirect()->back()->with('error', trans('messages.error_deleting_admin'));
        } else {
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->delete();
        }
        return redirect()->back()->with('success', trans('messages.success_delete'));
    }
}
