@extends('layouts.app')


@section('navbar')
@lang('layout.roles_management')
@endsection

@section('content')


<form action="{{ route('roles.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">@lang('layout.new_role')</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">@lang('layout.role_name')</label>
                            <input type="text" name="roleName" class="form-control">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                <i class="material-icons">vpn_key</i>
            </div>
            <h4 class="card-title">@lang('layout.permissions')</h4>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="table-wrapper">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ ucfirst($permission->name) }}</td>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                                value="{{ $permission->id }}">
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
    <button type="submit" class="btn btn-blue-grey btn-lg btn-block btn-round">@lang('layout.create_role')</button>
</form>

@endsection