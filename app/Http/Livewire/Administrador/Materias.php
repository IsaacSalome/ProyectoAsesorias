<?php

namespace App\Http\Livewire\Administrador;
use App\Models\Materia;
use App\Models\Semestres;
use App\Models\Carreras;
use App\Models\vistas\vistaMaterias;
use Livewire\WithPagination;


use Livewire\Component;

class Materias extends Component
{
        use WithPagination;

    public  $carreras, $semestres, $materias, $nombreMateria, $idMateria, $Carreras_idCarreras1, $Semestres_idSemestres;
    public $modal = false;

    public function render()
    {
        $this->materias = Materia::all();
        $vistaM = vistaMaterias::paginate(5);

        $this->semestres= Semestres::all();
        $this->carreras= Carreras::all();
        return view('livewire.administrador.materias',compact('vistaM'));
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
        $this->nombreMateria = ' ';
        $this->Carreras_idCarreras1 = ' ';
        $this->Semestres_idSemestres= ' ';
    }

    public function editar($id){
        $producto = Materia::findOrFail($id);
        $this->idMateria= $id;
        $this->nombreMateria = $producto->nombreMateria;
        $this->Carreras_idCarreras1 = $producto->Carreras_idCarreras1;
        $this->Semestres_idSemestres = $producto->Semestres_idSemestres;

        $this->abrirModal();
    }

    public function borrar($id){
        Materia::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente.');

    }

    Public function guardar(){

        Materia::updateOrCreate(['idMateria' => $this->idMateria],
        [
            'nombreMateria' => $this->nombreMateria,
            'Carreras_idCarreras1' => $this->Carreras_idCarreras1,
            'Semestres_idSemestres' =>$this->Semestres_idSemestres
    ]);
    session()->flash('message',
        $this->idMateria ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
    }
}
