<?php
use App\Models\jobs; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/jobs', function(){

    Route::get('/jobs', 'JobController@index');
    Route::get('/jobs/{id}', 'JobController@show');
    Route::post('/jobs', 'JobController@store');
    Route::put('/jobs/{id}', 'JobController@update');
    Route::delete('/jobs/{id}', 'JobController@destroy');
    Route::post('/logout', 'AuthController@logout');


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

?>