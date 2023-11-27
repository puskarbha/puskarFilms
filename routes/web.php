<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieScheduleController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('admin.adminPage');
});

Route::group(['middleware' => ['admin']], function () {


    Route::get('/adminPage', function () {
        return view('admin.adminDashboard');
    });
    Route::get('/home', function () {
        return view('admin.adminDashboard');
    });


    Route::get('/home', function () {
        return view('admin.adminDashboard');
    });

//Routes for Movies

    Route::get('/manage-branch', [BranchController::class, 'branchList'])->name('manageBranch');
    Route::get('/add-branch', function () {
        return view('admin.addBranch');
    })->name('addBranch');
    Route::POST('/push-branch', [BranchController::class, 'pushBranch'])->name('pushBranch');
    Route::get('/edit-branch/{id}', [BranchController::class, 'editBranch'])->name('editBranch');
    Route::POST('/updateBranch/{id}', [BranchController::class, 'updateBranch'])->name('updateBranch');
    Route::get('/delete-Branch/{id}', [BranchController::class, 'deleteBranch'])->name('deleteBranch');

//Routes for Movies
//
//    Route::get('/add-Movie', function () {
//        return view('admin.addMovie');
//    })->name('addMovie');
//    Route::POST('/push-movie', [MovieController::class, 'pushMovie'])->name('pushMovie');
//    Route::get('/movies-list', [MovieController::class, 'movieList'])->name('movies-list');
//    Route::get('/edit-movie/{id}', [MovieController::class, 'editMovie'])->name('editMovie');
//    Route::POST('/updateMovie/{id}', [MovieController::class, 'updateMovie'])->name('updateMovie');
//    Route::get('/delete-movie/{id}', [MovieController::class, 'deleteMovie'])->name('deleteMovie');

    Route::resource('movies', MovieController::class);
    Route::resource('show_times',ShowTimeController::class);
});



