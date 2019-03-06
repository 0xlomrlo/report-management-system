@extends('layouts.app')


@section('navbar')
@lang('layout.roles_management')
@endsection

@section('content')

<div class="container">

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">@lang('layout.create_group')</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">@lang('layout.group_name')</label>
                                <input type="text" name="groupName" value="{{ $group->name }}" class="form-control">
                                      </div>
                                    </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
            <button type="submit" class="btn btn-lg btn-block btn-round" style="background-color: #879ca7;color: #fff;">@lang('layout.update_group')</button>
    </form>
</div>


@endsection