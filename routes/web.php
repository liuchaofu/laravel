<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get("admin/index","AdminController@index")->name('admin.index');
//Route::any("admin/add","AdminController@add")->name("admin.add");
//Route::any("admin/edit/{id}","AdminController@edit")->name("admin.edit");
//Route::get("admin/del/{id}","AdminController@del")->name("admin.del");

//显示
Route::get("admin/index","AdminController@index")->name('admin.index');
//增加
Route::any("admin/add","AdminController@add")->name('admin.add');
//修改
Route::any("admin/edit/{id}","AdminController@edit")->name('admin.edit');
//删除
Route::get("admin/del/{id}","AdminController@del")->name('admin.del');

//help
Route::get("admin/info","AdminController@info")->name('admin.info');

//about
Route::get("admin/about","AdminController@about")->name('admin.about');

