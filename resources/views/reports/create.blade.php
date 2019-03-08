@extends('layouts.app')


@section('navbar')
@lang('layout.reports')
@endsection

@section('content')


<form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}


    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">@lang('layout.new_report')</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">@lang('layout.report_name')</label>
                                <input type="text" name="reportName" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">@lang('layout.type_report_content')</label>
                                    <textarea class="form-control" name="content" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">label</i>
                    </div>
                    <h4 class="card-title">@lang('layout.tags')</h4>
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
                                    @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ ucfirst($tag->name) }}</td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" name="tags[]"
                                                        value="{{ $tag->id }}">
                                                    <span class="form-check-sign">
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

        <div class="col-lg-6 col-md-12">
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
                                                        value="{{ $group->id }}">
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
                        <i class="material-icons">cloud_upload</i>
                    </div>
                    <h4 class="card-title">@lang('layout.files')</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <input type="file" name="files[]" multiple>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-blue-grey btn-lg btn-block btn-round">@lang('layout.create_report')</button>
</form>

@endsection