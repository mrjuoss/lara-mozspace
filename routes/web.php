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

Route::group(['prefix' => 'product'], function(){
  Route::get('/', function(){
    return "Data semua product";
  });

  Route::get('/select', function(){
    return "Tampilkan select";
  });

  Route::get('/add', function(){
    /* Entry Single Data dengan Create dg Mass Assignmen
    App\Product::create([
      'nama_barang' => 'Sendal',
      'jumlah'      => 30,
      'satuan'      => 'pasang',
      'harga'       => 100000
    ]);
    */

    $data = new App\Product;
    $data->nama_barang = 'Baju';
    $data->jumlah      = 5;
    $data->satuan      = 'buah';
    $data->harga       = 200000;
    $data->save();

  });

  Route::get('/show/{id}', function ($id){
    $data = App\Product::findOrFail($id);
    dd($data);
  });

  Route::get('/update/{id}', function($id){
    $product = App\Product::findOrFail($id);
    echo "Before update : ".$product->nama_barang. "<br>";
    $product->nama_barang = "Sarung";
    $product->save();
    $data = App\Product::find($id);
    echo "After update : ".$data->nama_barang;
  });

  Route::get('/search/{parameter}/{value}', function ($parameter, $value){
    $data = App\Product::where([$parameter == $value])->get();
    dd($data);
  });

  Route::group(['prefix' => 'sepatu'], function(){
    Route::get('/', function(){
      return "Tampilkan semua data sepatu";
    });
    Route::get('/adidas', function(){
      return "Tampilkan semua sepatu merk Adidas";
    });
  });
});
