<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // User management
    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-users', [UserController::class, 'addUser']);
    Route::put('/edit-users/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-users/{id}', [UserController::class, 'deleteUser']);

    // Patient management
    Route::get('/get-patients', [PatientController::class, 'getPatients']);
    Route::post('/add-patients', [PatientController::class, 'addPatient']);
    Route::put('/edit-patients/{id}', [PatientController::class, 'editPatient']);
    Route::delete('/delete-patients/{id}', [PatientController::class, 'deletePatient']);

    // Payment management
    Route::get('/get-payments', [PaymentController::class, 'getPayments']);
    Route::post('/add-payments', [PaymentController::class, 'addPayment']);
    Route::put('/edit-payments/{id}', [PaymentController::class, 'editPayment']);
    Route::delete('/delete-payments/{id}', [PaymentController::class, 'deletePayment']);

    // Role management
    Route::get('/get-roles', [RoleController::class, 'getRoles']);
    Route::post('/add-roles', [RoleController::class, 'addRole']);
    Route::put('/edit-roles/{id}', [RoleController::class, 'editRole']);
    Route::delete('/delete-roles/{id}', [RoleController::class, 'deleteRole']);

    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
