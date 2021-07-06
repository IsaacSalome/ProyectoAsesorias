<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Administrador\Materias;
use App\Http\Livewire\Administrador\RegistrarAlumno\Alumno;
use App\Http\Livewire\Administrador\RegistrarMaestro\Docente;

use App\Http\Livewire\DivisionInformatica\Solicitudes\RevisionSolicitudes as revision;

use App\Http\Livewire\Alumnos\Solicitud\SolicitarAsesoria;
use App\Http\Livewire\DivisionInformatica\Solicitudes\ProgramacionAsesorias;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/Materia',Materias::class)->name('materias');
    //Route::post('/Materia',Materias::class)->name('materias');

    Route::get('/Alumno',Alumno::class)->name('RegistroAlumnos');
    Route::get('/Docente',Docente::class)->name('RegistroDocente');
    Route::get('/Solicitar-Asesoria',SolicitarAsesoria::class)->name('SolicitarAsesoria');
    Route::get('/Revision-Asesoria',revision::class)->name('RevisionAsesoria');
    Route::get('/programacion-Asesoria',ProgramacionAsesorias::class)->name('ProgramacionAsesoria');

    Route::get('/dashboard',function () {
        return view('dashboard');
    })->name('dashboard');
});
