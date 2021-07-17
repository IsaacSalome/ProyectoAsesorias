<?php

namespace App\Http\Livewire\Alumnos\Horario;

use App\Models\Horarios;
use App\Models\HorariosAlumnos;
use App\Models\vistas\vista_HorarioGeneral;
use App\Models\vistas\vista_HorarioAlumnos;
use App\Models\Estudiantes;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Horario extends Component
{
    public $i=7, $var;
    public $search;
    public $sort='idHorariosAlumnos';
    public $direction='asc';
    use WithPagination;
    public $vista, $idHorariosAlumnos, $idHorarios, $idEstudiantes, $horarios;		
    public $modal = false;
    protected $rules = [
        'idHorarios' => 'required',
 

    ];
    protected $messages = [
        'idHorarios.required' => 'La justificación no puede estar vacío.',


    ];
    
    public function render()
    {
        $idusuario = auth()->id();
        $semes = Estudiantes::select('Semestres_idSemestres')->where('Users_id',$idusuario)->get();
        $idEstudiante = Estudiantes::select('idEstudiantes')->where('Users_id',$idusuario)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];

  
        $Halumno = vista_HorarioAlumnos::where('idEstudiantes', $variableidE)->paginate(5);

        $this->horarios = vista_HorarioGeneral::Where('numeroSemestre', $semes[0]['Semestres_idSemestres'])->get();
        $this->vista = DB::select('CALL view_horarioHalumno('.$variableidE.')');

    return view('livewire.alumnos.horario.horario', compact('Halumno'));
    }
    public function order($sort){

        if ($this->sort == $sort) {
            
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }

        } else {
            $this->sort = $sort;
        }

    }

    public function crear(){
        $this->limpiar();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal = true;
    }   
    
    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiar(){
        $this->idHorarios = ' ';

    }

    public function editar($id){
        $this->abrirModal();
        $idusuario = auth()->id();
        $idEstudiante = Estudiantes::select('idEstudiantes')->where('Users_id',$idusuario)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];

        $HA = HorariosAlumnos::findOrFail($id);
        $this->idHorariosAlumnos= $id;
        $this->idHorarios = $HA->idHorarios;
        $this->idEstudiantes = $HA->variableidE;

        $this->abrirModal();
    }
    public function borrar($id){
        HorariosAlumnos::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente.');

    }
    Public function guardar(){
        $this->validate();

        $idusuario = auth()->id();
        $idEstudiante = Estudiantes::select('idEstudiantes')->where('Users_id',$idusuario)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];

        HorariosAlumnos::updateOrCreate(['idHorariosAlumnos' => $this->idHorariosAlumnos],
        [
            'idHorarios' => $this->idHorarios,
            'idEstudiantes' => $variableidE,
    ]);
    session()->flash('message',
        $this->idHorariosAlumnos ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
    }

}
