@extends('layouts.app')


@section('navbar')
@lang('layout.reports')
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h3 class="card-title">@lang('layout.search')</h3>
                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="input-group md-form form-sm form-1 pl-0">
                        <form action="{{ route('reports.index') }}" method="GET" class="container">
                            <div class="input-group no-border">
                                <input type="text" name="search" class="form-control"
                                    placeholder="@lang('layout.search')..." autocomplete="off">
                                <button type="submit" class="btn btn-outline-info btn-round btn-just-icon">
                                    <i class="material-icons">search</i>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-info">
                <h3 class="card-title"> @lang('layout.reports')</h3>

                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <div class="container">


                    <div class="card">

                        @foreach ($reports as $report)
                        <div class="card-body">
                            <h4 class="card-title">{{ $report->name }}</h4>
                            <div class="card-text"><strong>@lang('layout.group')</strong>: @if ($report->group)
                                {{ $report->group->name }} @endif


                                <br />
                                <strong>@lang('layout.tags')</strong>: @foreach ($report->tags as $tag)

                                <span class="badge badge-default">{{ $tag->name }}</span> @endforeach</div>
                            @can('view')
                            <a href="{{ route('reports.show', $report->id) }}"><button type="button"
                                    class="btn btn-outline-primary btn-round"><i class="fas fa-eye"></i>
                                    @lang('layout.show')</button></a>
                            @endcan
                            @can('edit')
                            <a href="{{ route('reports.edit', $report->id) }}"><button type="button"
                                    class="btn btn-outline-warning btn-round">
                                    <i class="fas fa-edit"></i> @lang('layout.edit')</button></a>
                            @endcan
                            @can('delete')

                            <button onclick="deleteData( '{{ route('reports.delete', $report->id) }}' )"
                                data-target="#deleteModal" data-toggle="modal" type="button"
                                class="btn btn-outline-danger btn-round"><i class="fas fa-trash-alt"></i>
                                @lang('layout.delete')</button>

                            @endcan

                        </div>
                        <hr />
                        @endforeach

                        @if ($reports->hasPages())

                        <nav aria-label="Page navigation example">
                            <ul class="pagination pg-blue justify-content-center">
                                {{ $reports->onEachSide(3)->links() }}
                            </ul>
                        </nav>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@include('modal')
@endsection