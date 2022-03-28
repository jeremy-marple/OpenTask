<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

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
    return view('landing');
});

Route::get('/jemarple', 'App\Http\Controllers\AdminController@index');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/tasks', 'App\Http\Controllers\TaskController@index')->name('tasks');

Route::middleware(['auth:sanctum', 'verified'])->get('/templates', 'App\Http\Controllers\TemplateController@index')->name('templates');

Route::middleware(['auth:sanctum', 'verified'])->get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts');

Route::middleware(['auth:sanctum', 'verified'])->post('/addtask', 'App\Http\Controllers\AddTask@addtask');

Route::middleware(['auth:sanctum', 'verified'])->post('/addtemplate', 'App\Http\Controllers\AddTemplate@addtemplate');

Route::middleware(['auth:sanctum', 'verified'])->get('/deletetask/{id}', 'App\Http\Controllers\DeleteTask@deletetask');

Route::middleware(['auth:sanctum', 'verified'])->get('/task/delete/{id}', 'App\Http\Controllers\DeleteTask@deletetask_noemail');

Route::middleware(['auth:sanctum', 'verified'])->post('/updatetask/{id}', 'App\Http\Controllers\EditTask@updatetask');

Route::middleware(['auth:sanctum', 'verified'])->post('/updatecontact/{id}', 'App\Http\Controllers\ContactController@updatecontact');

Route::middleware(['auth:sanctum', 'verified'])->post('/updatetemplate/{id}', 'App\Http\Controllers\TemplateController@updatetemplatereal');

Route::middleware(['auth:sanctum', 'verified'])->get('/contact/delete/{id}', 'App\Http\Controllers\ContactController@deletcontact');

Route::middleware(['auth:sanctum', 'verified'])->get('/template/delete/{id}', 'App\Http\Controllers\TemplateController@deletetemplate');

Route::middleware(['auth:sanctum', 'verified'])->post('/addcontact', 'App\Http\Controllers\AddContact@addcontact');

Route::middleware(['auth:sanctum', 'verified'])->get('/task/edit/{id}', 'App\Http\Controllers\EditTask@edittask');

Route::middleware(['auth:sanctum', 'verified'])->get('/contact/edit/{id}', 'App\Http\Controllers\ContactController@editcontact');

Route::middleware(['auth:sanctum', 'verified'])->get('/template/edit/{id}', 'App\Http\Controllers\TemplateController@updatetemplate');

Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
