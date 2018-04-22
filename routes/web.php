<?php

Auth::routes();

// middleware for admin
Route::group(['prefix'=>'/admin_area','middleware'=>['auth','admin']],function (){
    Route::resource('/users','UsersController');
    Route::get('/user/remove_permsion/{id}', ['as'=>'remove_permision', 'uses'=>'UsersController@remove_permision']);
    Route::get('/user/make_admin/{id}', ['as'=>'make_admin', 'uses'=>'UsersController@make_admin']);
    Route::get('/posts/delete-f-ever/{id}',['as'=>'deleteforever','uses'=>'PostsController@deleteforever']);
    Route::get('/posts/restore/{id}',['as'=>'restore','uses'=>'PostsController@restore']);
});

/// middleware for user registred

Route::group(['prefix'=>'/admin_area','middleware'=>'auth'],function (){
    Route::get('/dashboard','HomeController@index')->name('home');
    Route::get('/logout','DashController@logout');
    Route::post('/logout','DashController@logout')->name('logout');
    Route::resource('/post','PostsController');
    Route::resource('/category','CategoriesController');
    Route::resource('/tags','TagController');
    Route::get('/profile/settings',['as'=>'show_profile','uses'=>'ProfileController@show_profile']);
    Route::patch('/profile/settings',['as'=>'update_profile','uses'=>'ProfileController@update_profile']);
    Route::get('/posts/trashed',['as'=>'trashed_posts','uses'=>'PostsController@trashed']);
});

// middleware for guest

Route::prefix('guest')->group(function (){
Route::get('/register','DashController@get_register')->name('show_register');
Route::post('/register',['as'=>'register_new_user','uses'=>'DashController@post_register']);
Route::get('/login','DashController@get_login')->name('login');
Route::post('/login',['as'=>'login','uses'=>'DashController@post_login']);
Route::get('forget_pass/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', ['as'=>'new_pass','uses'=>'Auth\ResetPasswordController@reset']);

});

Route::get('/',['as'=>'index_front','uses'=>'FrontendController@index']);
Route::get('/post/{slug}',['as'=>'show.post','uses'=>'FrontendController@single']);
Route::get('/category/{slug}',['as'=>'category.page','uses'=>'FrontendController@category']);
Route::get('/tags/{slag}',['as'=>'tag.page','uses'=>'FrontendController@tag']);
Route::any('/search',['as'=>'search','uses'=>'FrontendController@search']);