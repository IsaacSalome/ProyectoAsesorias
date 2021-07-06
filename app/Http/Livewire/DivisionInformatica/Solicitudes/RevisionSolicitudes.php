<?php

namespace App\Http\Livewire\DivisionInformatica\Solicitudes;

use App\Models\vistas\solicitudes_estudiantes as Solicitudes;
use  App\Models\vistas\Revision_Solicitudes as Revision;
use  App\Models\solicituasesorias;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class RevisionSolicitudes extends Component
{
    public  $estado, $idSolicitud, $estudiante, $justificacion, $materiaSolicitada;
    use WithPagination;
    public $modal = false;
    public $visualizar = false;

    public function render()
    {
        $vistaRE = Revision::where('estado', 'revisión')->orwhere('estado', 'Rechazada')->paginate(5);

        return view('livewire.division-informatica.solicitudes.revision-solicitudes', compact('vistaRE'));
    }



    public function crear(){
        $this->abrirModal();
    }
    public function abrirModal(){
        $this->modal = true;
    }   
    public function cerrarModal(){
        $this->modal = false;
    }

    public function visualizar(){
        $this->abrirview();
    }
    public function abrirview(){
        $this->visualizar = true;
    }   
    public function cerrarview(){
        $this->movisualizardal = false;
    }



    public function view($id){
        $Revision = Revision::findOrFail($id);
        $this->idSolicitud= $id;
        $this->estudiante = $Revision->estudiante;
        $this->materiaSolicitada =$Revision->materiaSolicitada;
        $this->justificacion =$Revision->justificacion;
        $this->estado =$Revision->estado;

        $this->abrirview();
    }

    
    public function editar($id){
        $solicitud = solicituasesorias::findOrFail($id);
        $this->idSolicitud= $id;
        $this->estado = $solicitud->estado;


        $this->abrirModal();
    }

    public function actualizar(){
        
        solicituasesorias::where('idSolicituAsesorias', $this->idSolicitud)->update([
            'idSolicituAsesorias' => $this->idSolicitud,
            'estado' => $this->estado,
        ]);
        $this->cerrarModal();

    }
}
