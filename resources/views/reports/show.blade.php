@extends('layouts.app')


@section('navbar')
@lang('layout.reports')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title text-center">{{ $report->name }}</h4>
                    @if($report->created_at)<p class="card-category text-center"><i class="far fa-clock"></i>
                        {{ $report->created_at->format('Y-m-d') }}</p>@endif
                    @if($report->user) <p class="card-category text-center"><i class="fas fa-user"></i>
                        {{ $report->user->username }}</p>@endif
                </div>
                <div class="card-body">
                    <div class="container text-center">
                        <h4>{{ $report->content }}</h4>
                        <div class="card">
                            <div class="card-body">
                                @if ($report->group)<strong>@lang('layout.group')</strong>:
                                {{ $report->group->name }} @endif
                                <br />
                                @if ($report->tags)
                                <strong>@lang('layout.tags')</strong>:
                                @foreach($report->tags as $tag)
                                <span class="badge badge-default">{{ $tag->name }}</span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <hr />
                        <td>
                            <button type="button" class="btn btn-outline-warning btn-round"><i class="fas fa-edit"></i>
                                @lang('layout.edit')</button>

                            <button href="javascript:;"
                                onclick="deleteData( '{{ route('reports.delete', $report->id) }}' )"
                                data-target="#deleteModal" data-toggle="modal" type="button"
                                class="btn btn-outline-danger btn-round"><i class="fas fa-trash-alt"></i>
                                @lang('layout.delete')</button>
                        </td>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">attachment</i>
                    </div>
                    <h4 class="card-title">@lang('layout.attachments')</h4>
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
                                        <a
                                            href="{{ route('report.files', ['uuid' => $report->id, 'name' => $file->name]) }}"><button
                                                class="btn btn-round btn-just-icon"
                                                style="background-color:#59698d!important;color:#fff;"><i
                                                    class="fas fa-download"></i></button></a>
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
    </div>

@include('modal')
@endsection