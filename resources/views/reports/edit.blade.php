@extends('layouts.app')


@section('navbar')
@lang('layout.reports')
@endsection

@section('content')

<form action="{{ route('reports.update', $report->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">@lang('layout.update_report')</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">@lang('layout.report_name')</label>
                                <input type="text" name="reportName" class="form-control" value="{{ $report->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">@lang('layout.type_report_content')</label>
                                    <textarea class="form-control" name="content"
                                        rows="5">{{ $report->content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">label</i>
                    </div>
                    <h4 class="card-title">@lang('layout.tags')</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">@lang('layout.tags_label')</label>
                                    <input type="text" name="tags"
                                        value="@foreach($report->tags as $tag){{ $loop->last ? $tag->name : $tag->name . ', ' }}@endforeach"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">group_work</i>
                    </div>
                    <h4 class="card-title">@lang('layout.group')</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                    <tr>
                                        <td>{{ $group->name }}</td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="group"
                                                        value="{{ $group->id }}"
                                                        {{$report->group->id === $group->id ? 'checked' : ''}}>
                                                    <span class="circle">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">attachment</i>
                    </div>
                    <h4 class="card-title">@lang('layout.attachments') <small>(@lang('layout.delete_files'))</small>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($report->files->count() > 0)
                    <div class="container">
                        <div class="row">
                            @foreach ($report->files as $file)
                            <div class="col-md-3">
                                <div class="card ">
                                    <div class="card-body text-center">
                                        <h5 class="card-text">{{ $file->name }}</h5>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="dFiles[]"
                                                    value="{{ $file->id }}">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <h4 class="text-center"> @lang('layout.no_files') </h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">cloud_upload</i>
                    </div>
                    <h4 class="card-title">@lang('layout.upload_files')
                        <small>(@lang('layout.upload_multiple_files'))</small></h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <input type="file" name="files[]" multiple>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="btn btn-blue-grey btn-lg btn-block btn-round">@lang('layout.update_report')</button>
        </div>
    </div>
</form>

@endsection