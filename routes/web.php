<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;

use App\Models\Project;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', [ProjectController::class, 'index'])->name('project.index');

Route::get('/', function () {
    return view('welcome');
});
// Routes for project
Route::controller(ProjectController::class)->group(function (){
    Route::get('/project/create', 'create')->name('project.create');
    Route::post('/project', 'store')->name('project.store');
    Route::get('/project', 'index')->name('project.index');
    Route::get('/project/{project}/show', 'show')->name('project.show');
    Route::get('/project/{project}/edit', 'edit')->name('project.edit');
    Route::put('/project/{project}/update', 'update')->name('project.update');
    Route::delete('/project/{project}/delete', 'destroy')->name('project.delete');
});

// Routes  students
Route::controller(StudentController::class)->group(function() {
    Route::get('/student/create/{project}', 'create')->name('student.create');
    Route::post('/student/store/{project}', 'store')->name('student.store');
    Route::delete('/student/{student}/delete', 'destroy')->name('student.delete');
});

// Rotes for groups
Route::controller(GroupController::class)->group(function(){
    Route::post('/group/store', 'store')->name('group.store');
    Route::post('/group/delete', 'destroy')->name('group.delete');
});




