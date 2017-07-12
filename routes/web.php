<?php

Route::get('/', "PageController@index")->name('blog.home');
Route::get('/about', "PageController@about")->name('about');
Route::get('/blog', "BlogController@blog")->name('blog');
Route::get('single/{category}/{id}/{any}',"PageController@single")->name('single.post');
Route::get('category/{category}/{id}',"PageController@categorypost")->name('category.post');
Route::post('/search', "SearchController@Search");
Route::post('/email/add', 'EmailSubController@emailsub');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>  'auth:admins'],function(){
    Route::get('/messages', 'MessageController@index')->name('msg.seen');
    Route::get('/messagesSeen', 'MessageController@Seen');
    Route::post('/message/delete', 'MessageController@delete');
    Route::post('/messageSeen', 'MessageController@messageSeen');
    Route::post('/email/delete', 'EmailSubController@emaildelete');
    Route::post('/picgallery/delete', "PicGalleryController@picDelete");
    Route::post('/slider/delete', "SideController@slideDelete");
    Route::get('/user/list',"UsersController@index")->name('users.list');
    Route::get('/editor/list',"UsersController@editorIndex")->name('editor.list');
    Route::get('/postcreate', 'PostController@create')->name('post.create');
    Route::post('/category/edit', "CategoryController@cedit");
    Route::post('/category/delete', "CategoryController@cdelete");
});
Route::group(['middleware' => 'auth:admins | auth:editor'],function(){
 Route::get('/postcreate', 'PostController@create')->name('post.create');
 Route::post('/category/edit', "CategoryController@cedit");
 Route::post('/category/delete', "CategoryController@cdelete");
    
});


Auth::routes();
Route::resource('post', 'PostController');
Route::resource('category', 'CategoryController');
Route::resource('comment', 'CommentController');
Route::resource('contact', 'ContactController');
Route::resource('email', 'EmailSubController');
Route::resource('picgallery', 'PicGalleryController');
Route::resource('slider', 'SideController');

Auth::routes();

Route::get('login-facebook', 'Auth\FacebookController@redirectToProvider')->name('facebook');
Route::get('login-facebook-callback', 'Auth\FacebookController@handleProviderCallback');

/* google plus Route */
Route::get('login-google', 'Auth\GoogleController@redirectToProvider')->name('google');
Route::get('login-google-callback', 'Auth\GoogleController@handleProviderCallback');
Route::post('user/logout', "Auth\LoginController@userlogout")->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
    Route::get('/login', "Admin\AdminLoginController@showLoginForm")->name('admin.login');
    Route::post('/login', "Admin\AdminLoginController@login")->name('admin.login.submit');
    Route::post('/register', "Editor\EditorRegisterController@register")->name('admin.register');
    Route::post('/editor/remove', "Editor\EditorRegisterController@editorRemove")->name('editor.remove');
    Route::get('/', "AdminController@index")->name('admin.dashboard');
    Route::post('/logout', "Admin\AdminLoginController@logout")->name('admin.logout');
    Route::get('/post', "AdminController@allpost")->name('admin.post.all');
    Route::post('/post/{id}', "AdminController@postdestroy")->name('admin.post.delete');
    //password Reset Route
    Route::post('/password/email', 'Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Admin\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
Route::prefix('editor')->group(function(){
    Route::get('/login', "Editor\EditorLoginController@showLoginForm")->name('editor.login');
    Route::post('/login', "Editor\EditorLoginController@login")->name('editor.login.submit');
    Route::post('/logout', "Editor\EditorLoginController@logout")->name('editor.logout');
    Route::get('/', "EditorController@index")->name('editor.dashboard');
    //password Reset Route
    Route::post('/password/email', 'Editor\EditorForgotPasswordController@sendResetLinkEmail')->name('editor.password.email');
    Route::get('/password/reset', 'Editor\EditorForgotPasswordController@showLinkRequestForm')->name('editor.password.request');
    Route::post('/password/reset', 'Editor\EditorResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Editor\EditorResetPasswordController@showResetForm')->name('editor.password.reset');
    Route::get('/postcreate', 'EditorController@editorcreate')->name('editor.post.create');
    //other route
    Route::get('/post',"EditorController@editorpostshow")->name('editor.post.index');
    Route::get('/category',"EditorController@editorcategoryshow")->name('editor.category.index');
    Route::post('editor/category/edit', "EditorController@ecedit")->name('editor.category.edit');
    Route::post('/category/add', "EditorController@estore")->name('editor.cat.add');
    Route::post('/category/delete', "EditorController@ecdelete");
});
