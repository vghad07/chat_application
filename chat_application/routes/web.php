<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', 'PagesController@index');
//Route::get('/about', 'PagesController@about');
//Route::get('/service', 'PagesController@service');


Auth::routes();
//Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index');

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
Route::get('/verifymail/activate/{act_code}/activateEmail', 'VerifyMailController@activateEmail');
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
Route::get('/chat/index/{rid}/ch', 'ChatController@display');
Route::post('/ajaxchatRequest', 'TemplateController@temp')->name('ajaxchatRequest.temp');
Route::get('/groupchat/index/{gid}/gch', 'GroupchatController@display');
//Route::get('/ajax/ajaxgetRequests', 'AjaxController@search')->name('ajaxgetRequests.search');;
Route::get('/chat/group', 'ChatController@group');
Route::post('/chat/group', 'ChatController@groupInsert');
//Route::get('/ajax/ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('/ajax/ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');
Route::post('/ajax/ajaxRequests', 'AjaxController@ajaxRequestsPost')->name('ajaxRequests.insertpost');
Route::post('/ajax/aRequest', 'AjaxController@ajaxRequestcountMessage')->name('aRequest.countmessage');
Route::post('/ajax/aRequests', 'AjaxController@ajaxRequestseenMessage')->name('aRequests.seenmessage');
Route::post('/ajax/ajaxReq', 'AjaxController@ajaxReqgetGUsers')->name('ajaxReq.getGUsers');
Route::post('/ajax/ajaxReqs', 'AjaxController@ajaxReqsgetTUsers')->name('ajaxReqs.getTUsers');
Route::get('/groupchat/groupchatRequest', 'GroupchatController@groupchatRequest');
Route::post('/groupchat/groupchatinsert', 'GroupchatController@groupChatInsert');
Route::post('/groupchat/groupchatRequest', 'GroupchatController@groupchatRequestPost')->name('groupChatRequest.post');
Route::post('/groupchat/groupchatRequests', 'GroupchatController@groupchatRequestsinsertPost')->name('groupChatRequests.insertpost');

Route::get('/template/template_list', 'TemplateController@index');
Route::get('/template/create', 'TemplateController@create');
Route::get('/template/edit/{id}', 'TemplateController@edit');
Route::get('/template/delete/{id}', 'TemplateController@destroy');
Route::get('/template/activate/{id}', 'TemplateController@activate');
Route::get('/template/deactivate/{id}', 'TemplateController@deactivate');
Route::post('/template/template_list', 'TemplateController@insert');
Route::get('/template/assign', 'TemplateController@assign');
Route::post('/template/assign', 'TemplateController@addUserGroupTemplate');