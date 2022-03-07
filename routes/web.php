<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InventoryController;
use GuzzleHttp\Promise\Create;

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
    return view('item_inventory');
});

//tambah data bagian inventori
// Route::get('tambah-inventori', [InventoryController::class, 'create']);
Route::post('tambah-inventori', [InventoryController::class, 'store']);
