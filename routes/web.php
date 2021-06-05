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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hi', function () {
    return 'hello world';
});

Route::get('/hi/{name}', function ($name) {
    return 'Hello, ' . $name;
});

// 程式由上至下執行，所以比較細的要先往上擺

Route::group(['prefix' => '/demo/'], function(){
    Route::get('hello', function () {
        return 'Hello';
    });
    Route::get('world', function () {
        return 'world';
    });
});

// 導向不同網頁
Route::get('/cw', function () {
    return redirect('https://www.cw.com.tw/');
});
Route::redirect('/cw2', 'https://www.cw.com.tw/', 301);

// 能顯示不同的view
Route::get('/cw3', function () {
    return view('cw');
});


// 命名為hi2.name
Route::get('/hi2/{name}', function ($name) {
    return 'Hello, ' . $name;
})->name('hi2.name');

// 呼叫hi2.name，並給name的值
Route::get('/hi2url', function () {
    return redirect(route('hi2.name', ['name' => 'Mary']));
});
