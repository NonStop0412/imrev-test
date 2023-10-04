<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompaniesController;
use App\Http\Controllers\API\ClientsController;
use App\Http\Controllers\API\UserController;
use App\Http\Middleware\ForceJsonResponse;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ForceJsonResponse::class] ,function () {
Route::post('/register', [UserController::class, 'createUser'])->name('register');
Route::post('/login', [UserController::class, 'loginUser'])->name('login');

Route::group(['middleware' => ['auth:sanctum']] ,function () {
    //Companies
    Route::get('/companies', [CompaniesController::class, 'getAll'])->name('companies.index');
    Route::get('/companies/{id}/clients', [CompaniesController::class, 'getClientsByCompanyId'])->name('companies.clients');
    //Clients
    Route::get('/clients', [ClientsController::class, 'getAll'])->name('clients.index');
    Route::get('/clients/{id}/companies', [ClientsController::class, 'getCompaniesByClientId'])->name('clients.companies');
});
});
