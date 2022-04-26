<?php

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

Route::group(['prefix' => 'v1'], function () {

    /**
     * Authentication
     */
    Route::post('login', [\App\Http\Controllers\Auth\UserController::class, 'login']);


    Route::group(['middleware' => ['auth:sanctum']], function () {

        /**
         * Tasks | Projects
         */
        Route::apiResource('tasks', \App\Http\Controllers\TaskController::class);

    });


});
