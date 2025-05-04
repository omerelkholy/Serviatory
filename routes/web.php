<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource("/services", ServiceController::class);
    Route::resource("reservations", ReservationController::class);
    Route::patch('/reservations/{id}/cancel', [ReservationController::class, 'cancel'])->name("reservations.cancel");
    Route::patch('/reservations/{id}/confirm', [ReservationController::class, 'confirm'])->name("reservations.confirm");
    Route::patch('/reservations/{id}/reject', [ReservationController::class, 'reject'])->name("reservations.reject");

});


Route::middleware(['auth', 'admin'])->group(function (){

    Route::get("/dashboard", [DashboardController::class,"dashboard"])->name("dashboard.index");
    Route::get("/dashboard/users", [DashboardController::class,"dashUser"])->name("dashboard.users");
    Route::get("/dashboard/services", [DashboardController::class,"dashService"])->name("dashboard.services");
    Route::get("/dashboard/reservations", [DashboardController::class,"dashReservation"])->name("dashboard.reservations");
    Route::get("/dashboard/users/edit/{id}", [UserController::class, "edit"])->name("dashboard.userEdit");
    Route::patch("/dashboard/users/{id}", [UserController::class, "update"])->name("dashboard.userUpdate");
    Route::delete("/dashboard/users/destroy/{id}", [UserController::class, "destroy"])->name("dashboard.userDestroy");
});



require __DIR__.'/auth.php';
