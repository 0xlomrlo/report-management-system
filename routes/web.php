<?php

// Authentication
Route::group(['middleware' => ['web']], function () {
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
});

// Redirect
Route::get('/',  ['as' => 'redirect', function () {
    return redirect('/reports');
}]);

// Localization
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

// Reports
Route::get('reports/', ['as' => 'reports.index', 'uses' => 'ReportController@index']);

Route::group(['middleware' => ['permission:view']], function () {
    Route::get('reports/{uuid}', ['as' => 'reports.show', 'uses' => 'ReportController@show']);
    Route::get('reports/download/{uuid}/{name}', ['as' => 'report.files', 'uses' => 'ReportController@getFile']);

});

Route::group(['middleware' => ['permission:create']], function () {
    Route::get('create/report', ['as' => 'reports.create', 'uses' => 'ReportController@create']);
    Route::post('create/report', ['as' => 'reports.store', 'uses' => 'ReportController@store']);
});
Route::group(['middleware' => ['permission:edit']], function () {
    Route::get('reports/{uuid}/edit', ['as' => 'reports.edit', 'uses' => 'ReportController@edit']);
    Route::put('reports/{uuid}/edit', ['as' => 'reports.update', 'uses' => 'ReportController@update']);

});
Route::group(['middleware' => ['permission:delete']], function () {
    Route::delete('reports/{uuid}/delete', ['as' => 'reports.delete', 'uses' => 'ReportController@destroy']);
});

// Admin
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
    Route::post('users/create', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::put('users/{id}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);
    Route::delete('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);

    Route::get('groups', ['as' => 'groups.index', 'uses' => 'GroupController@index']);
    Route::get('groups/create', ['as' => 'groups.create', 'uses' => 'GroupController@create']);
    Route::post('groups/create', ['as' => 'groups.store', 'uses' => 'GroupController@store']);
    Route::get('groups/{id}/edit', ['as' => 'groups.edit', 'uses' => 'GroupController@edit']);
    Route::put('groups/{id}/update', ['as' => 'groups.update', 'uses' => 'GroupController@update']);
    Route::delete('groups/{id}/delete', ['as' => 'groups.delete', 'uses' => 'GroupController@destroy']);

    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index']);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'RoleController@create']);
    Route::post('roles/create', ['as' => 'roles.store', 'uses' => 'RoleController@store']);
    Route::get('roles/{id}/edit', ['as' => 'roles.edit', 'uses' => 'RoleController@edit']);
    Route::put('roles/{id}/update', ['as' => 'roles.update', 'uses' => 'RoleController@update']);
    Route::delete('roles/{id}/delete', ['as' => 'roles.delete', 'uses' => 'RoleController@destroy']);

});
