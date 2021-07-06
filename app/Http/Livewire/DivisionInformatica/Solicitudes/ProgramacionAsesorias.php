<?php

namespace App\Http\Livewire\DivisionInformatica\Solicitudes;
use  App\Models\vistas\Revision_Solicitudes as Revision;
use App\Models\Estudiantes;
use App\Models\Docentes;
use Livewire\WithPagination;

use Livewire\Component;

class ProgramacionAsesorias extends Component
{
    public $docentes, $estudiantes;

    use WithPagination;
    public $modal = false;
    public $programacion = false;

    public function render()
    {
        $vistaRE = Revision::Where('estado','Autorizada')->paginate(5);

        $this->docentes = Docentes::all();

        return view('livewire.division-informatica.solicitudes.programacion-asesorias', compact('vistaRE'));
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

}
