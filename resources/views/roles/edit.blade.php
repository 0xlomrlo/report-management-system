@extends('layouts.app')


@section('navbar')
@lang('layout.roles_management')
@endsection

@section('content')

<div class="container">

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">@lang('layout.create_role')</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">@lang('layout.role_name')</label>
                                <input type="text" name="roleName" value="{{ $role->name }}" class="form-control">
                                      </div>
                                    </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">


            <div class="container-fluid">
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
                                                        <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->hasPermissionTo($permission) ? 'checked' : ''}}>
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
    
            <button type="submit"
                class="btn btn-lg btn-block btn-round" style="background-color: #879ca7;color: #fff;">@lang('layout.update_role')</button>
        </div>
    </form>
</div>


@endsection