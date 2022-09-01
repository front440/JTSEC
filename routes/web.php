<?php

use Illuminate\Support\Facades\Route;
use App\Mail\UpdateOrderStatusMaillable;
use Illuminate\Support\Facades\Mail;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');
Route::get('/user', 'UserController@index')->name('user')->middleware('auth');

//Routes admin
Route::group([
    'middleware' => 'admin',  // TODO middleware for the user
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    // proyectos
    Route::get('/project/projects', [App\Http\Controllers\Admin\ProjectController::class, 'all']);
    Route::get('/add-project', [App\Http\Controllers\Admin\ProjectController::class, 'add']);
    Route::post('/create-project', [App\Http\Controllers\Admin\ProjectController::class, 'create']);
    Route::get('/project/{id}/asign-user', [App\Http\Controllers\Admin\ProjectController::class, 'asignUser']);
    Route::post('/project/{id}/asign-user/add', [App\Http\Controllers\Admin\ProjectHasUserController::class, 'create']);
    Route::get('/project/{id}/users', [App\Http\Controllers\Admin\ProjectHasUserController::class, 'usersOfProject']);



    // Actividades
    Route::get('/project/{id}/activities', [App\Http\Controllers\Admin\ActivityController::class, 'all']);
    Route::get('/project/{id}/add-activity', [App\Http\Controllers\Admin\ActivityController::class, 'add']);
    Route::post('/project/{id}/add-activity/create', [App\Http\Controllers\Admin\ActivityController::class, 'create']);

    // Incidencias
    Route::get('/project/{id}/activity/{activity_id}/incidences', [App\Http\Controllers\Admin\IncidenceController::class, 'all']);

    Route::get('/project/{id}/activity/{activity_id}/add-incidence', [App\Http\Controllers\Admin\IncidenceController::class, 'add']);
    Route::post('/project/{id}/activity/{activity_id}/add-incidence/create', [App\Http\Controllers\Admin\IncidenceController::class, 'create']);



    Route::get('/project/{id}/activity/asign-user', [App\Http\Controllers\Admin\ActivityController::class, 'asignUser']);


    Route::get('/user/users', [App\Http\Controllers\Admin\UserController::class, 'all']);
    Route::post('/create-user', [App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::get('/users/user-view/{id}', [App\Http\Controllers\Admin\ProjectHasUserController::class, 'projectUsers']);
    Route::get('/users/user-view-activity/{id}', [App\Http\Controllers\Admin\ProjectHasUserController::class, 'activityUsers']);


    Route::post('/users/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
    Route::get('/users/edit-view/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::post('/users/update-user/{id}', [App\Http\Controllers\Admin\UserController::class, 'update']);


});

Route::group([
    'middleware' => 'user',
    'prefix' => 'user',
    'namespace' => 'user'
], function () {
});

Route::get("/update-order-status/{id}", function () {
    $correo = new UpdateOrderStatusMaillable();

    // Mail::to("troll93k@gmail.com")->send($correo);

    return redirect("admin/orders")->with("status", "Actualización de estado enviado a usuario");

});

