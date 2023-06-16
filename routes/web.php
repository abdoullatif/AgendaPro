<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreneauController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdministrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Connecte
Route::get('/', [AuthController::class, 'cat'])->name('cat');

//Connecte
Route::get('/login', [AuthController::class, 'index'])->name('login');

//Register page
Route::get('/register', [AuthController::class, 'registerUser'])->name('register');

//Create account
Route::post('/storeUser', [AuthController::class, 'storeUser'])->name('storeUser');

//Login portal
Route::get('/login/{id}', [AuthController::class, 'login'])->name('login.id');

//Login connection
Route::post('/login/connection', [AuthController::class, 'customLogin'])->name('customLogin');

//Login
Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');

/*
|--------------------------------------------------------------------------
| Web Routes Home
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'index'])->name('home');



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

//Creneau
Route::get('/creneau', [CreneauController::class, 'index'])->name('creneau');

//Creneau add
Route::get('/creneau/add', [CreneauController::class, 'addCreneau'])->name('creneau.add');

//Creneau store
Route::post('/creneau/store', [CreneauController::class, 'storeCreneau'])->name('creneau.store');

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

//Creneau
Route::get('/calendrier', [CalendrierController::class, 'index'])->name('calendrier');

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

//Creneau
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

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

//Client
Route::get('/client', [ClientController::class, 'index'])->name('client');

Route::get('/client/add', [ClientController::class, 'addClient'])->name('client.add');

Route::post('/client/store', [ClientController::class, 'storeClient'])->name('client.store');


/*
|--------------------------------------------------------------------------
| Web Routes Administrateur
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin
Route::get('/administration', [AdministrationController::class, 'index'])->name('admin');

//administrateur 
Route::get('/add/administrateur', [AdministrationController::class, 'addAdmin'])->name('admin.add');

//store 
Route::post('/store/administrateur', [AdministrationController::class, 'storeUserAdmin'])->name('administrateur.store');

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

//Notification
Route::get('/notification', [NotificationController::class, 'index'])->name('admin');

Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('show.invoice');
 
Route::post('/notif', [NotificationController::class, 'sendNotification'])->name('notify.send');