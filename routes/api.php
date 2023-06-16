<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\CreneauController;
use App\Http\Controllers\Api\V1\DashboardController;

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

//API Home
Route::get('/', HomeController::class);

//API Dashboard
Route::get('/dashboard/nombre_admin_employer', [DashboardController::class, 'nombre_admin_employer']);
Route::get('/dashboard/nombre_client', [DashboardController::class, 'nombre_client']);
Route::get('/dashboard/nombre_creneau', [DashboardController::class, 'nombre_creneau']);
Route::get('/dashboard/nombre_creneau_comfirmed', [DashboardController::class, 'nombre_creneau_comfirmed']);
Route::get('/dashboard/creneaux', [DashboardController::class, 'creneaux']);


//Creneau
Route::get('/creneau', [CreneauController::class, 'index']);
Route::get('/creneau/{id}', [CreneauController::class, 'show']);
Route::post('/creneau', [CreneauController::class, 'store']);
Route::put('/creneau/{id}', [CreneauController::class, 'update']);
Route::delete('/creneau/{id}', [CreneauController::class, 'delete']);