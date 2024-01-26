<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiUrlController;

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

Route::middleware('bearer.token')->post('/api/v1/short-urls', [apiUrlController::class, 'urlTransform']);
