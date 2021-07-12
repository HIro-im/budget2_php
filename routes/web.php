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
    return view('top');
});

//テスト用のルート
Route::get('tests/test', 'TestController@index');


//支出登録用のルート
Route::group(['prefix' => 'budget', 'middleware' => 'auth'], function(){
    Route::get('index', 'BudgetFormController@index')->name('budget.index');
    Route::get('create', 'BudgetFormController@create')->name('budget.create');
    Route::post('store', 'BudgetFormController@store')->name('budget.store');
    Route::get('show/{id}', 'BudgetFormController@show')->name('budget.show');
    Route::get('edit/{id}', 'BudgetFormController@edit')->name('budget.edit');
    Route::post('update/{id}', 'BudgetFormController@update')->name('budget.update');
});

//計算処理用のルート
Route::group(['prefix' => 'calc', 'middleware' => 'auth'], function(){
    Route::get('input', 'CalcController@input')->name('calc.input');
    Route::get('result', 'CalcController@result')->name('calc.result');
});

//Laravelで作成した認証のルート
Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
