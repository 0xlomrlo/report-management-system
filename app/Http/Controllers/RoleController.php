<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roleName' => 'required',
            'permissions' => 'required',
        ]);

        $input = [
            'roleName' => $request->get('roleName'),
            'permissions' => $request->get('permissions'),
        ];

        Role::create(['name' => $input['roleName'], 'guard_name' => 'web']);
        $role = Role::where('name', $input['roleName'])->first();
        foreach($input['permissions'] as $permission){
            $role->givePermissionTo($permission);
        }

        return redirect('roles')->with('success', trans('messages.success_create'));
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'roleName' => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $input = [
            'roleName' => $request->get('roleName'),
            'permissions' => $request->get('permissions'),
        ];
        foreach ($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }
        foreach($input['permissions'] as $permission){
            $role->givePermissionTo($permission);
        }

        return redirect('roles')->with('success', trans('messages.success_update'));
    }

    public function destroy($id)
    {
       $role = Role::findById($id)->delete();
       if($role){
           return redirect('roles')->with('success', trans('messages.success_delete'));
       }
       return redirect('roles')->with('error', trans('messages.error'));
    }
}
