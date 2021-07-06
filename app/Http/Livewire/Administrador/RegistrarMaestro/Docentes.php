<?php

namespace App\Http\Livewire\Administrador\RegistrarMaestro;

use Livewire\Component;

class Docentes extends Component
{
    public function render()
    {
        return view('livewire.administrador.registrar-maestro.docentes');
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
    
}
