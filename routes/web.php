<?php

use App\Http\Controllers\Admin\TaskController as AdminTaskController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**Info : redirect after login setup is in LoginController */

Route::group(['middleware'=>'auth'], function(){

    /** Routes for Admin */
    Route::group([
        'prefix'=>'admin',                                                  // url prefix : /admin/...
        'middleware'=>'is_admin',                                           // middleware defined in "class IsAdminMiddleware" and registred in "class Kernel extends HttpKernel". Access only for admins in the closure defined routes
        'as'=> 'admin.'                                                     // just for route names .... ex: route('admin.task.index')
    ],
    function(){
        Route::get('tasks',                                                 // route will be: /admin/tasks
            [\App\Http\Controllers\Admin\TaskController::class,'index'])
            ->name('tasks.index');                                          // prefix 'admin.' will be added

        Route::get('tasks/{id}', [AdminTaskController::class , 'show'])->name('tasks.show');
        Route::put('tasks/{id}', [AdminTaskController::class,'update'])->name('tasks.update');
        Route::delete('tasks/{task}', [AdminTaskController::class,'destroy'])->name('tasks.destroy');
    });

    /** Routes for users */
    Route::group([
        'prefix'=>'user',                                                   // url prefix : /user/ ....
        'as'=>'user.'                                                       // just for route names .... ex: route('user.task.index')
    ],
    function(){
        Route::get('tasks',                                                 // route will be: /user/tasks
            [\App\Http\Controllers\User\TaskController::class,'index'])
            ->name('tasks.index');                                           // prefix 'user.' will be added
    });

});
