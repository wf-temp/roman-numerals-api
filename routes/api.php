<?php
use App\Http\Controllers\Api\RomanNumeralConversionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/roman-numeral-conversions')
    ->group(function () {
    Route::post('/convert', [RomanNumeralConversionController::class, 'convert']);
    Route::get('/recent', [RomanNumeralConversionController::class, 'recent']);
    Route::get('/most-frequent', [RomanNumeralConversionController::class, 'mostFrequent']);
});
