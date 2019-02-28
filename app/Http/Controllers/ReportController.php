<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
class ReportController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


   
    public function index(Request $request)
    {
        $reports = Report::with(['group'])->get();
        // dd($reports->first()->group->name);
        return view('report.index', compact('reports'));
    }

 
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Report::findOrFail($id);
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
