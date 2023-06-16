<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreneauController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\GoogleAccountController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\SynchronisationController;

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

//Creneau edite
Route::get('/creneau/edit/{id}', [CreneauController::class, 'editCreneau'])->name('creneau.edit');

//Creneau update confirmed
Route::get('/creneau/up/conf/{id}', [CreneauController::class, 'confirmedCreneau'])->name('creneau.up.comfirmed');

//Creneau update cancel
Route::get('/creneau/up/cancel/{id}', [CreneauController::class, 'cancelCreneau'])->name('creneau.up.cancel');

//Creneau store edite
Route::post('/creneau/store/edit/{id}', [CreneauController::class, 'editstoreCreneau'])->name('creneau.store.edit');

//Creneau delete
Route::get('/creneau/del/{id}', [CreneauController::class, 'delCreneau'])->name('creneau.del');

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

//Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

//Profile
Route::post('/profile/up/{id}', [ProfileController::class, 'upProfile'])->name('profile.up');

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
Route::get('/notification', [NotificationController::class, 'index'])->name('notif');

Route::get('/notification/{id}', [NotificationController::class, 'show'])->name('show.notification');
 
Route::post('/notif', [NotificationController::class, 'sendNotification'])->name('notify.send');


/*
|--------------------------------------------------------------------------
| Web Routes Synchronisation
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Sync google
Route::get('/sync', [SynchronisationController::class, 'index'])->name('sync');


//other Google 
Route::get('/google', [GoogleAccountController::class, 'index'])->name('google.index');
Route::get('/google/oauth', [GoogleAccountController::class, 'store'])->name('google.store');
Route::delete('/google/{googleAccount}', [GoogleAccountController::class, 'destroy'])->name('google.destroy');