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

Route::get('/belajar', function () {
    return view('belajar');
});

Route::get('/test-parameter/{data}', function($data){
  echo "Data yang diparsing adalah ".$data;
});

Route::get('/test-parameter-opsional/{data?}', function($data = 'tidak ada'){
  echo "Data yang diparsing adalah ".$data;
});

Route::get('/test-dua-parameter/{data1}/{data2}', function($data1, $data2){
  echo "Data yang diparsing adalah ".$data1." dan ".$data2;
});
