<?php

namespace App\Http\Livewire\DivisionInformatica\Solicitudes;
use  App\Models\vistas\Revision_Solicitudes as Revision;
use App\Models\Estudiantes;
use App\Models\Docentes;
use App\Models\solicituasesorias;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class ProgramacionAsesorias extends Component
{
    public $idDocentes, $docentes,$estudiantes, $idEstudiantes, $vista, $datosEst, $nombre, $apellidos;
  
    use WithPagination;
    public $modal = false;
    public $programacion = false;

    public $vistaDH = null, $selectDocente= null, $selectHD = null;

    public function render()
    {
        $vistaRE = Revision::Where('estado','Autorizada')->
        OrWhere('estado','Cancelada')->paginate(5);

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
    public function cerrarModal2(){
        $this->programacion = false;
    }


    public function RegistrarSolicitud(){
        $this->abrirModal2();
    }
    public function editar($id){
     $idEstudiante = solicituasesorias::select('idEstudiantes')->where('idSolicituAsesorias',$id)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];
        $Revision = Revision::findOrFail($variableidE);
 
        $this->idEstudiantes = $variableidE;
        $this->nombre = $Revision->estudiante;

        $this->vista = DB::select('CALL view_horarioHalumno('.$variableidE.')');

        $this->abrirModal2();
    }


}
