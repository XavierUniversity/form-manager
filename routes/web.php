<?php
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormFieldsController;
use App\Http\Controllers\FormFieldFormsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

/*
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
*/
Route::get('/', [FormController::class, 'index']);
Route::resource('forms', FormController::class);
Route::resource('fields', FormFieldsController::class);
Route::resource('form_fields', FormFieldFormsController::class);
require __DIR__.'/auth.php';
