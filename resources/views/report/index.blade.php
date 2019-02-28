@extends('layouts.app')


@section('navbar')
@lang('layout.reports')
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
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
                                <div class="input-group-prepend">
                                    <span class="input-group-text cyan lighten-2" id="basic-text1"><i
                                            class="fas fa-search text-white" aria-hidden="true"></i></span>
                                </div>
                                <input class="form-control my-0 py-1" type="text" placeholder="@lang('layout.search')"
                                    aria-label="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h3 class="card-title">@lang('layout.reports')</h3>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        <div class="container">



                            <div class="card">

                                @foreach ($reports as $report)
                                <div class="card-body">
                                    <h4 class="card-title">{{ $report->name }}</h4>
                                    <div class="card-text"><strong>@lang('layout.group')</strong>: {{ $report->group }}
                                        <br /><strong>@lang('layout.tags')</strong>: Medical, Technology</div>
                                    <a href="{{ route('reports.show', $report->id) }}" ><button type="button" class="btn btn-outline-primary waves-effect">@lang('layout.show')</button></a>


                                </div>
                                <hr />
                                @endforeach

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pg-blue justify-content-center">
                                        <li class="page-item disabled">
                                            <span class="page-link">@lang('layout.previous')</span>
                                        </li>
                                        <li class="page-item"><a class="page-link">1</a></li>
                                        <li class="page-item active">
                                            <span class="page-link">
                                                2
                                                <span class="sr-only">(current)</span>
                                            </span>
                                        </li>
                                        <li class="page-item"><a class="page-link">3</a></li>
                                        <li class="page-item"><a class="page-link">4</a></li>
                                        <li class="page-item"><a class="page-link">5</a></li>
                                        <li class="page-item">
                                            <a class="page-link">@lang('layout.next')</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>



















                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection