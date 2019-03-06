<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('group')->except(['index']);
    }

    public function index(Request $request)
    {

        if (Input::has('search')) {
            $search = Input::get('search');
            $reports = Report::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('content', 'LIKE', '%' . $search . '%')
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('username', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('group', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('tags', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })->with(['group', 'tags'])->byUser($request->user())->paginate(10);
            $reports->appends($request->only('search'));
        } else {
            $reports = Report::byUser($request->user())->with(['group', 'tags'])->paginate(10);
        }

        return view('reports.index', compact('reports'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $report = Report::with(['group', 'tags', 'user'])->findOrFail($id);

        return view('reports.show', compact('report'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $user = Report::find($id)->delete();
        if ($user) {
            return redirect()->back()->with('success', trans('messages.success_delete'));
        } else {
            return redirect()->back()->with('error', trans('messages.error'));
        }

    }
}
