@extends('layouts.app')


@section('navbar')
@lang('layout.users_management')
@endsection

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-info">
                        <h3 class="card-title">@lang('layout.users')
                        <a href="{{ route('users.create') }}"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-plus"></i>
                            @lang('layout.create_user')</i></a>
                        </h3>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        <div class="container">




                            <div class="table-wrapper">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="th-lg">
                                                <a>@lang('layout.username')
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a>@lang('layout.user_role')
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a>@lang('layout.created_date')
                                                </a>
                                            </th>
                                            <th class="th-lg">
                                                <a>@lang('layout.actions')
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)

                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                                @endforeach</td>
                                            <td>@if($user->created_at){{ $user->created_at->format('Y-m-d') }}@endif</td>
                                            <td>
                                                <a href="{{ $user->id }}" class="text-warning fa-border" title="Edit"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ $user->id }}" class="text-danger fa-border" title="Delete"><i class="fas fa-user-times"></i></a>
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