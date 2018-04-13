<?php




Auth::routes();



Route::prefix('dash')->group(function (){
    Route::get('/','HomeController@index');
    Route::get('/logout','DashController@logout');
    Route::post('/logout','DashController@logout')->name('logout');
    Route::resource('/post','PostsController');
});

Route::prefix('guest')->group(function (){
Route::get('/register','DashController@get_register')->name('show_register');
Route::post('/register',['as'=>'register_new_user','uses'=>'DashController@post_register']);
Route::get('/login','DashController@get_login')->name('login');
Route::post('/login',['as'=>'login','uses'=>'DashController@post_login']);
});



Route::get('forget_pass/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', ['as'=>'new_pass','uses'=>'Auth\ResetPasswordController@reset']);

