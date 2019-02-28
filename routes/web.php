<?php



Route::group(['middleware' => ['web']], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
});

Route::get('/', function () {
    return redirect('/reports');
});

Route::get('lang/{lang}', function ($lang) {
    Session::put('lang', $lang);
    return redirect()->back();
});

    
Route::get('reports', ['as' => 'reports.index', 'uses' => 'ReportController@index']);
Route::get('reports/{uuid}', ['as' => 'reports.show', 'uses' => 'ReportController@show']);

Route::get('users', ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::get('groups', ['as' => 'groups.index', 'uses' => 'GroupController@index']);

