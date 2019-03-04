@extends('layouts.app')


@section('navbar')
@lang('layout.roles_management')
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h3 class="card-title">@lang('layout.roles')
                        <a href="{{ route('users.create') }}"><button type="button" class="btn btn-warning btn-round btn-sm"><i class="fas fa-plus"></i>
                            @lang('layout.create_role')</i></a>
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
                                                <a>@lang('layout.role')
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a>@lang('layout.permissions')
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a>@lang('layout.actions')
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($roles as $role)
                                        <tr>
                                        <td>{{ ucfirst($role->name) }}</td>
                                                <td>@foreach ($role->permissions as $permission)
                                                    <span class="badge badge-pill badge-primary">{{ ucfirst($permission->name) }}</span>
                                                @endforeach</td>
                                            <td>
                                               @if ($role->name != 'admin')
                                                <a href="" class="text-warning fa-border" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="" class="text-danger fa-border" title="Delete"><i class="fas fa-trash"></i></a>
                                                @endif
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
        </div>
    </div>
</div>


@endsection