@extends('layouts.app')


@section('navbar')
@lang('layout.users_management')
@endsection

@section('content')

<div class="container">

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">@lang('layout.update_user')</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">@lang('layout.username')</label>
                                            <input type="text" name="username" class="form-control"
                                                value="{{ $user->username }}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">@lang('layout.password')</label>
                                            <input type="password" name="password" class="form-control">
                                            <label>@lang('layout.password_validation')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
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
                            <i class="material-icons">group</i>
                        </div>
                        <h4 class="card-title">@lang('layout.user_role')</h4>
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
                                        @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ucfirst($role->name) }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                            value="{{ $role->id }}"
                                                            {{ ($user->hasRole($role)) ? 'checked' : '' }}>

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
                        <h4 class="card-title">@lang('layout.groups')</h4>

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
                                                        <input class="form-check-input" type="checkbox" name="groups[]"
                                                            value="{{ $group->id }}"
                                                            {{ ($user->hasGroup($group->id)) ? 'checked' : '' }}>
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
            
            <button type="submit"class="btn btn-lg btn-block btn-round" style="background-color: #879ca7;color: #fff;">@lang('layout.update_user')</button>
        </div>
    </form>
</div>

@endsection