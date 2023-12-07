<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\Cinema;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeatBookingController;
use App\Http\Controllers\ShowTimeController;
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



Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/available_shows',[HomeController::class,'available_shows'])->name('available_shows');
Route::get('/movie/{id}',[HomeController::class,'movieDetails'])->name('home.movieDetails');
Route::get('/hall_seats/{show_id}',[HomeController::class,'hall_seats'])->name('hall_seats');
//Route::delete('/deleteHall/{hall_id}',[BranchController::class,'deleteHall'])->name('deleteHall');
Route::group(['middleware' => ['admin']], function () {



    Route::get('/adminPage', function () {
        return view('admin.adminDashboard');
    })->name('adminPage');

    Route::resource('branches', BranchController::class);
    Route::resource('movies', MovieController::class);
    Route::resource('show_times',ShowTimeController::class);
    Route::resource('seat_bookings', SeatBookingController::class);
    Route::resource('halls', HallController::class);



});



