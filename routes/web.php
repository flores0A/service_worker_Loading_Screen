<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Routing\RouteGroup;

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
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('/empleado/create', [EmpleadoController::class, 'create']);
*/
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
//codigo ppara sacar el register y reset
Auth::routes(['reset'=>false]); 

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::get('/storage/uploads/{filename}', function ($filename) {
    return response()->file(storage_path('app/public/uploads/' . $filename));
})->where('filename', '.*');

Route::group(['middleware'=>'auth'], function () {
    
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});