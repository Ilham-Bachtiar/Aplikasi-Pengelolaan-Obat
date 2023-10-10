<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TbObatController;
use App\Http\Controllers\TbJenisObatController;

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
    return view('login');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/manajemenjenisobat', [TbJenisObatController::class, 'index'])->name('manajemenjenisobat');
Route::get('/tambahjenisobat', [TbJenisObatController::class, 'tambahjenisobat'])->name('tambahjenisobat');
Route::post('/insertjenisobat', [TbJenisObatController::class, 'insertjenisobat'])->name('insertjenisobat');
Route::get('/tampiljenisobat/{id}', [TbJenisObatController::class, 'tampiljenisobat'])->name('tampiljenisobat');
Route::post('/updatejenisobat/{id}', [TbJenisObatController::class, 'updatejenisobat'])->name('updatejenisobat');
Route::get('/deletejenisobat/{id}', [TbJenisObatController::class, 'deletejenisobat'])->name('deletejenisobat');
Route::get('/manajemenobat', [TbObatController::class, 'index'])->name('manajemenobat');
Route::get('/tambahobat', [TbObatController::class, 'tambahobat'])->name('tambahobat');
Route::get('/manajemenuser', [UserController::class, 'index'])->name('manajemenuser');
Route::get('/tambahdatauser', [UserController::class, 'tambahdatauser'])->name('tambahdatauser');
Route::post('/insertdatauser', [UserController::class, 'insertdatauser'])->name('insertdatauser');
Route::get('/tampildatauser/{id}', [UserController::class, 'tampildatauser'])->name('tampildatauser');
Route::post('/updatedatauser/{id}', [UserController::class, 'updatedatauser'])->name('updatedatauser');
Route::get('/deletedatauser/{id}', [UserController::class, 'deletedatauser'])->name('deletedatauser');