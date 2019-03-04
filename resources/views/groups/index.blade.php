@extends('layouts.app')


@section('navbar')
@lang('layout.groups_management')
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h3 class="card-title">@lang('layout.groups')
                        <a href="{{ route('users.create') }}"><button type="button" class="btn btn-warning btn-round btn-sm"><i class="fas fa-plus"></i>
                            @lang('layout.create_user')</i></a>
                        </h3>
                        <p class="card-category"></p>
                    </div>
                    <div class="container">
                    <div class="card-body">

                            <div class="table-wrapper">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="th-lg">
                                                <a>@lang('layout.group_name')
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a>@lang('layout.actions')
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr>
                                        <td></td>
                                            <td>
                                                <a href="" class="text-warning fa-border" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="" class="text-danger fa-border" title="Delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection