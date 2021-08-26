<?php
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
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

//Public Routes
// Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'] );
Route::get('/products/search/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);


// Protcted Routes
Route::group(['middleware' => ['auth:sanctum']] , function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

});

// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products', [ProductController::class, 'index'] );

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
