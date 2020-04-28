<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
  
    return view('welcome');
});*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/service', 'PagesController@service');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('posts','PostsController');
//Route::resource('users','UsersController');
//Auth::routes();

Route::get('/users/create', 'UsersController@create');
Route::post('/users/adduser','UsersController@store');

Route::get('/users/user_list', 'UsersController@ulist');
Route::get('/users/user_profile', 'UsersController@userProfile');
Route::post('/users/user_profile','UsersController@editProfile');
Route::get('/users/user_list/{id}/edit', 'UsersController@edit');
Route::put('/users/user_list/{id}/update', 'UsersController@update');
Route::get('/users/user_list/{id}/activate', 'UsersController@activate');
Route::get('/users/user_list/{id}/deactivate', 'UsersController@deactivate');
Route::get('/users/user_list/{id}/delete', 'UsersController@destroy');

Route::get('/group/group_list', 'GroupController@index');
Route::get('/group/usergroup', 'GroupController@userGroup');
Route::post('/group/usergroup', 'GroupController@addUserGroup');
Route::get('/group/create', 'GroupController@create');
Route::post('/group/addgroup', 'GroupController@store');

Route::get('/group/group_list/edit/{id}', 'GroupController@edit');
Route::put('/group/group_list/update/{id}', 'GroupController@update');
Route::get('/group/group_list/delete/{id}', 'GroupController@destroy');
Route::get('/chat/index', 'ChatController@index');
Route::post('/chat/index', 'ChatController@insert');
Route::get('/chat/group', 'ChatController@group');
Route::post('/chat/group', 'ChatController@groupInsert');
Route::get('/ajax/ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('/ajax/ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');
Route::post('/ajax/ajaxRequests', 'AjaxController@ajaxRequestsPost')->name('ajaxRequests.insertpost');
Route::post('/ajax/ajaxReq', 'AjaxController@ajaxReqgetUsers')->name('ajaxReq.getUsers');
Route::get('/groupchat/groupchatRequest', 'GroupchatController@groupchatRequest');
Route::post('/groupchat/groupchatinsert', 'GroupchatController@groupChatInsert');
Route::post('/groupchat/groupchatRequest', 'GroupchatController@groupchatRequestPost')->name('groupChatRequest.post');
Route::post('/groupchat/groupchatRequests', 'GroupchatController@groupchatRequestsinsertPost')->name('groupChatRequests.insertpost');

