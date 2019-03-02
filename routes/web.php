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
Route::group(['middleware' => ['role:Admin|User']], function() {
    Route::get('reports', ['as' => 'reports.index', 'uses' => 'ReportController@index']);
    Route::get('reports/{uuid}', ['as' => 'reports.show', 'uses' => 'ReportController@show'])->middleware('permission:View');
    Route::get('reports/{uuid}/create', ['as' => 'reports.create', 'uses' => 'ReportController@show'])->middleware('permission:Create');
    Route::post('reports/{uuid}/create', ['as' => 'reports.post.create', 'uses' => 'ReportController@show'])->middleware('permission:Create');
    Route::get('reports/{uuid}/edit', ['as' => 'reports.edit', 'uses' => 'ReportController@show'])->middleware('permission:Edit');
    Route::post('reports/{uuid}/edit', ['as' => 'reports.put.edit', 'uses' => 'ReportController@show'])->middleware('permission:Edit');
    Route::post('reports/{uuid}/delete', ['as' => 'reports.post.delete', 'uses' => 'ReportController@show'])->middleware('permission:Delete');
});

// User Management
Route::group(['middleware' => ['role:Admin']], function() {
    Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
    Route::post('users/create', ['as' => 'users.store', 'uses' => 'UserController@store']);
    Route::get('groups', ['as' => 'groups.index', 'uses' => 'GroupController@index']);
});
