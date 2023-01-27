<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->name('home');;
/*
Route::controller(CursoController::class)->group(function(){

    Route::get('cursos',                'index')    -> name('cursos.index');
    Route::get('cursos/create',         'create')   -> name('cursos.create');
    Route::post('cursos',               'store')    -> name('cursos.store');
    Route::get('cursos/{curso}',        'show')     -> name('cursos.show');
    Route::get('cursos/{curso}/edit',   'edit')     -> name('cursos.edit');
    Route::put('cursos/{curso}',        'update')   -> name('cursos.update');
    Route::delete('cursos/{curso}',     'destroy')  -> name('cursos.destroy');

});
*/

Route::resource('cursos', CursoController::class);//->parameters(['asignaturas'=>'curso'])->names('cursos');

Route::view('nosotros','nosotros')->name('nosotros');


Route::get('cursos/{curso}/imprimirTicket',[ CursoController::class, 'imprimirTicket'])->name('cursos.imprimirTicket');