<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'groupName' => 'required',
        ]);

        $input = [
            'groupName' => $request->get('groupName'),
        ];

        Group::create(['name' => $input['groupName']]);

        return redirect('groups')->with('success', trans('messages.success_create'));

    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'groupName' => 'required',
        ]);

        $input = [
            'groupName' => $request->get('groupName'),
        ];
        $group = Group::findOrFail($id);
        $group->update(['name' => $input['groupName']]);

        return redirect('groups')->with('success', trans('messages.success_update'));

    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();
        if ($group) {
            return redirect('groups')->with('success', trans('messages.success_delete'));
        }
        return redirect('groups')->with('error', trans('messages.error'));
    }
}
