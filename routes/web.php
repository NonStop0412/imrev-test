<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/403', function () {
    return view('errors.403');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Companies
Route::prefix('/companies')->middleware('auth')->group(function () {
    Route::get('/', [CompaniesController::class, 'getAll'])->name('companies.index');
    Route::get('/info/{id}', [CompaniesController::class, 'info'])->name('companies.info');
    Route::post('/info/{id}', [CompaniesController::class, 'update'])->name('companies.edit');
    Route::get('/create', [CompaniesController::class, 'create'])->name('companies.create');
    Route::post('/save', [CompaniesController::class, 'save'])->name('companies.save');
    Route::post('/delete', [CompaniesController::class, 'delete'])->name('companies.delete');
});

//Clients
Route::prefix('/clients')->middleware('auth')->group(function () {
    Route::get('/', [ClientsController::class, 'getAll'])->name('clients.index');
    Route::get('/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::post('/save', [ClientsController::class, 'save'])->name('clients.save');
    Route::get('/info/{id}', [ClientsController::class, 'info'])->name('clients.info');
    Route::post('/info/{id}', [ClientsController::class, 'update'])->name('clients.edit');
    Route::post('/addCompany/{id}', [ClientsController::class, 'addCompany'])->name('clients.addCompany');
    Route::post('/deleteCompany', [ClientsController::class, 'deleteCompany'])->name('clients.deleteCompany');
    Route::post('/delete', [ClientsController::class, 'delete'])->name('clients.delete');
});


require __DIR__.'/auth.php';
