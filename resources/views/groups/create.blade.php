@extends('layouts.app')


@section('navbar')
@lang('layout.roles_management')
@endsection

@section('content')


<form action="{{ route('groups.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">@lang('layout.new_group')</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">@lang('layout.group_name')</label>
                            <input type="text" name="groupName" class="form-control">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-blue-grey btn-lg btn-block btn-round">@lang('layout.create_group')</button>
</form>

@endsection