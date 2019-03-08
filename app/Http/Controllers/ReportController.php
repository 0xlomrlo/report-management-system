<?php

namespace App\Http\Controllers;

use App\Report;
use App\ReportFile;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('group')->except(['index', 'create', 'store']);
    }

    public function index(Request $request)
    {
        if (Input::has('search')) {
            $search = Input::get('search');
            $reports = Report::generalSearch($search)->with(['group', 'tags'])->byUser($request->user())->paginate(10);
            $reports->appends($request->only('search'));
        } else {
            $reports = Report::orderBy('created_at', 'desc')->byUser($request->user())->with(['group', 'tags'])->paginate(10);
        }

        return view('reports.index', compact('reports'));
    }

    public function create(Request $request)
    {
        $tags = Tag::all();
        $groups = $request->user()->groups;

        return view('reports.create', compact('tags', 'groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reportName' => 'required',
            'content' => 'nullable',
            'group' => 'required',
            'tags' => 'required',
        ]);

        if (!$request->user()->hasGroup($request->get('group'))) {
            return redirect()->back()->with('error', trans('messages.error'));
        }

        $input = [
            'name' => $request->get('reportName'),
            'content' => $request->get('content'),
            'group_id' => $request->get('group'),
            'user_id' => $request->user()->id,
        ];

        $report = Report::create($input);
        foreach ($request->get('tags') as $tag) {
            $report->tags()->attach($tag);
        }
        if ($request->hasFile('files')) {
            $files = $request->File('files');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                Storage::disk('local')->putFileAs(
                    'reports/' . $report->id,
                    $file,
                    $filename
                );

                ReportFile::create(['name' => $filename, 'report_id' => $report->id]);
            }
        }

        return redirect('reports/' . $report->id)->with('success', trans('messages.success_create'));
    }

    public function show($id)
    {
        $report = Report::with(['group', 'tags', 'user', 'files'])->findOrFail($id);

        return view('reports.show', compact('report'));
    }

    public function getDownload($uuid, $name)
    {
        if (file_exists(storage_path('app/reports/' . $uuid . '/' . $name))) {
            return response()->download(storage_path('app/reports/' . $uuid . '/' . $name));
        }

        return redirect('reports/' . $uuid)->with('error', trans('messages.file_not_found'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        if ($report) {
            $report->tags()->detach();
            $report->files()->delete();
            Storage::deleteDirectory('reports/' . $report->id);
            $report->delete();
            return redirect('reports')->with('success', trans('messages.success_delete'));
        } else {
            return redirect()->back()->with('error', trans('messages.error'));
        }

    }
}
