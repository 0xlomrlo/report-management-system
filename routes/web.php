<?php


// Authentication
Route::group(['middleware' => ['web']], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
});

// Redirect
Route::get('/', function () {
    return redirect('/reports');
});

// Localization
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');


// Reports
Route::get('reports', ['as' => 'reports.index', 'uses' => 'ReportController@index']);
Route::get('reports/{uuid}', ['as' => 'reports.show', 'uses' => 'ReportController@show'])->middleware('permission:view');
Route::get('reports/{uuid}/create', ['as' => 'reports.create', 'uses' => 'ReportController@show'])->middleware('permission:create');
Route::post('reports/{uuid}/create', ['as' => 'reports.post.create', 'uses' => 'ReportController@show'])->middleware('permission:create');
Route::get('reports/{uuid}/edit', ['as' => 'reports.edit', 'uses' => 'ReportController@show'])->middleware('permission:edit');
Route::post('reports/{uuid}/edit', ['as' => 'reports.put.edit', 'uses' => 'ReportController@show'])->middleware('permission:edit');
Route::delete('reports/{uuid}/delete', ['as' => 'reports.delete', 'uses' => 'ReportController@destroy'])->middleware('permission:delete');


// Admin
Route::group(['middleware' => ['role:admin']], function() {
    Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
    Route::post('users/create', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::put('users/{id}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);


    Route::delete('users/{id}/delete', ['as' => 'users.delete', 'uses' => 'UserController@destroy']);
    Route::get('groups', ['as' => 'groups.index', 'uses' => 'GroupController@index']);
    Route::get('roles', ['as' => 'roles.index', 'uses' => 'RoleController@index']);
});
