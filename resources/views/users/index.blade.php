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
                            <a href="{{ route('users.create') }}"><button type="button"
                                    class="btn btn-warning btn-round btn-sm"><i class="fas fa-plus"></i>
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
                                            <th>
                                                <a>@lang('layout.username')
                                                </a>
                                            </th>
                                            <th>
                                                <a>@lang('layout.user_role')
                                                </a>
                                            </th>
                                            <th>
                                                <a>@lang('layout.created_date')
                                                </a>
                                            </th>
                                            <th>
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
                                                {{ ucfirst($role->name) }}
                                                @endforeach</td>
                                            <td>@if($user->created_at){{ $user->created_at->format('Y-m-d') }}@endif
                                            </td>
                                            <td>

                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="text-warning fa-border" title="Edit"><i
                                                        class="fas fa-user-edit"></i></a>


                                                @if (!$user->hasRole('admin'))<a href="" class="text-danger fa-border"
                                                    data-toggle="modal"
                                                    onclick="deleteData( '{{ route('users.delete', $user->id) }}' )"
                                                    data-target="#deleteModal" title="Delete"><i
                                                        class="fas fa-user-times"></i></a>@endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr />
                                @if ($users->hasPages())
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pg-blue justify-content-center">
                                        {{ $users->onEachSide(3)->links() }}
                                    </ul>
                                </nav>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('modal')
@endsection