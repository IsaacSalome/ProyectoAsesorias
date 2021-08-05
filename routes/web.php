<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Administrador\Materias;
use App\Http\Livewire\Administrador\HorarioMateria\HorarioMaterias;
use App\Http\Livewire\Administrador\RegistrarAlumno\Alumno;
use App\Http\Livewire\Administrador\RegistrarMaestro\Docente;
use App\Http\Livewire\DivisionInformatica\Solicitudes\RevisionSolicitudes as revision;
use App\Http\Livewire\Alumnos\Solicitud\SolicitarAsesoria;
use App\Http\Livewire\Alumnos\Horario\Horario;
use App\Http\Livewire\Docentes\Horarios\Horario as horarioDocentes;
use App\Http\Livewire\DivisionInformatica\Solicitudes\ProgramacionAsesorias;
use App\Http\Controllers\AsesoriaController;
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
    //Route de Administración
    Route::get('/Materia',Materias::class)->middleware('can:materias')->name('materias');
    Route::get('/Alumno',Alumno::class)->middleware('can:RegistroAlumnos')->name('RegistroAlumnos');
    Route::get('/Docente',Docente::class)->middleware('can:RegistroDocente')->name('RegistroDocente');
    Route::get('/Horario-materia',HorarioMaterias::class)->middleware('can:HorarioMaterias')->name('HorarioMaterias');

    //Route de Alumno
    Route::get('/Solicitar-Asesoria',SolicitarAsesoria::class)->middleware('can:SolicitarAsesoria')->name('SolicitarAsesoria');
    Route::get('/Horario-alumno',Horario::class)->middleware('can:HorarioAlumno')->name('HorarioAlumno');

    //Route de Division
    Route::get('/Revision-Asesoria',revision::class)->middleware('can:RevisionAsesoria')->name('RevisionAsesoria');
    Route::get('/programacion-Asesoria',ProgramacionAsesorias::class)->middleware('can:ProgramacionAsesoria')->name('ProgramacionAsesoria');
    Route::resource('/programacion-Asesoria/store', AsesoriaController::class)->middleware('can:CrearProgramacion')->names('CrearProgramacion')->only('store'); 

    //Route de Docente
    Route::get('/Docente/Horarios', horarioDocentes::class)->middleware('can:HorarioDocente')->name('HorarioDocente');

    Route::get('/dashboard',function () {
        return view('dashboard');
    })->name('dashboard');
});
