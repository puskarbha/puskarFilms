<?php

use App\Http\Controllers\BranchController;
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
    Route::get('/manage-branch', [BranchController::class, 'branchList'])->name('manageBranch');
    Route::get('/add-branch', function () {
        return view('admin.addBranch');
    })->name('addBranch');

    Route::POST('/push-branch', [BranchController::class, 'pushBranch'])->name('pushBranch');

    Route::get('/delete-Branch/{id}', [BranchController::class, 'deleteBranch'])->name('deleteBranch');
    Route::get('/edit-branch/{id}', [BranchController::class, 'editBranch'])->name('editBranch');
    Route::POST('/updateBranch/{id}', [BranchController::class, 'updateBranch'])->name('updateBranch');

});



