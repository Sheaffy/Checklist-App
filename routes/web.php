<?php

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/manage-checklists', [App\Http\Controllers\ChecklistTemplates::class, 'manage_templates'])->middleware('auth')->name('manage_templates');
Route::get('/create-checklist', [App\Http\Controllers\ChecklistTemplates::class, 'view_create_template'])->middleware('auth')->name('view_create_template');
Route::post('/create-checklist', [App\Http\Controllers\ChecklistTemplates::class, 'create_template'])->middleware('auth')->name('create_template');
Route::get('/view-template/{id}', [App\Http\Controllers\ChecklistTemplates::class, 'view_template'])->middleware('auth')->name('view_template');
Route::post('/add-step', [App\Http\Controllers\ChecklistTemplates::class, 'add_step'])->middleware('auth')->name('add_step');
Route::get('/delete-step/{id}', [App\Http\Controllers\ChecklistTemplates::class, 'delete_step'])->middleware('auth')->name('delete_step');

Route::get('/run-template/{id}', [App\Http\Controllers\RunChecklist::class, 'run_checklist'])->middleware('auth')->name('run_checklist');
Route::post('/finalise-checklist', [App\Http\Controllers\RunChecklist::class, 'finalise_checklist'])->middleware('auth')->name('finalise_checklist');
Route::get('/delete-execution/{id}', [App\Http\Controllers\RunChecklist::class, 'delete_execution'])->middleware('auth')->name('delete_execution');
