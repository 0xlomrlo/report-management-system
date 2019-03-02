@extends('layouts.app')

@section('content')

<div class="container">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h3 class="card-title text-center"><i class="fa fa-lock"></i> @lang('layout.login')</h3>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="container">
                                    <form class="text-center border border-light p-5" method="POST"
                                        action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <input id="username" class="form-control mb-4" type="username" class="form-control"
                                            name="username" placeholder="@lang('layout.username')" value="{{ old('username') }}" required
                                            autofocus>
                                        <input id="password" type="password" class="form-control mb-4" name="password"
                                            placeholder="@lang('layout.password')" required>

                                        <div class="d-flex justify-content-around">
                                            <div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="defaultLoginFormRemember"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="defaultLoginFormRemember">@lang('layout.remember_me')</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button
                                            class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0"
                                            type="submit">@lang('layout.login')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection