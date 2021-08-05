<?php

namespace App\Http\Livewire\DivisionInformatica\Solicitudes;
use  App\Models\vistas\Revision_Solicitudes as Revision;
use App\Models\Estudiantes;
use App\Models\Docentes;
use App\Models\solicituasesorias;
use App\Models\Asesorias;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class ProgramacionAsesorias extends Component
{
    public $idRevicion, $Exist_Asesoria = null, $idDocente,$semanas, $HoraInicial, $HoraFinal, $fechaAsesoria,$docentes,$estudiantes, $idEstudiantes, $vista, $datosEst, $nombre, $apellidos;
  
    use WithPagination;
    public $programacion = false;

    public $vistaDH , $selectDocente= null, $selectHD = null;

    public function render()
    {
    /*    if($this->idRevicion != null){
        $this->Exist_Asesoria = Asesorias::Where('idSolicitud', $this->idRevicion);
         }*/
         
        $vistaRE = Revision::Where('estado','Autorizada')->
        OrWhere('estado','Cancelada')
        ->orWhere('estado','Programada')->orderBy('estado', 'ASC')->get();

        $this->docentes = Docentes::all();

        return view('livewire.division-informatica.solicitudes.programacion-asesorias', compact('vistaRE'));
    }


    public function updatedselectDocente($idDocente)
    {


        $this->vista = DB::select('CALL view_horarioHalumno('.$this->idEstudiantes.')');
        $this->vistaDH = DB::select('CALL view_horarioDocente('.$idDocente.')');

    }

    public function program(){
 
        $this-> abrirModal2();
    }
    public function abrirModal2(){
        $this->programacion = true;
    }   
    public function cerrarModal(){
        $this->programacion = false;
        $this->selectDocente = false;
        $this->selectHD = false;


    }
    
    public function limpiar(){
        $this->fechaAsesoria = ' ';
        $this->semanas = ' ';
        $this->HoraInicial = ' ';
        $this->HoraFinal = ' ';
        $this->idEstudiantes = ' ';
        $this->idDocentes = ' ';


    }


    public function RegistrarSolicitud(){
        $this->abrirModal2();
    }
    public function editar($id){

        $idEstudiante = solicituasesorias::select('idEstudiantes')->where('idSolicituAsesorias',$id)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];
        $Revision = Revision::findOrFail($variableidE);
        $this->idRevicion = $id;
 
        $this->idEstudiantes = $variableidE;
        $this->nombre = $Revision->estudiante;

        $this->vista = DB::select('CALL view_horarioHalumno('.$variableidE.')');

        $this->abrirModal2();

    }


}
