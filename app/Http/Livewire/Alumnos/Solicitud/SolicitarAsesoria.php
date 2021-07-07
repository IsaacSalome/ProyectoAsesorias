<?php

namespace App\Http\Livewire\Alumnos\Solicitud;

use Livewire\Component;
use App\Models\vistas\solicitudes_estudiantes as Solicitudes;
use App\Models\solicituasesorias as sol;
use App\Models\Estudiantes;
use App\Models\User;
use App\Models\Materia;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class SolicitarAsesoria extends Component
{
    use WithPagination;
    public  $estudiante, $idEstudiante, $materia, $idSolicituAsesorias, $justificacion, $estado, $idEstudiantes, $idMateria;
    public $modal = false;

    protected $rules = [
        'justificacion' => 'required',
        'idMateria' => 'required',
 

    ];
    protected $messages = [
        'justificacion.required' => 'La justificación no puede estar vacío.',
        'idMateria.required' => 'Seleccione una materia',


    ];

    public function render()
    {
 
        $idusuario = auth()->id();
        $idEstudiante = Estudiantes::select('idEstudiantes')->where('Users_id',$idusuario)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];

       $vistaSA = Solicitudes::where('idEstudiantes', $variableidE)->paginate(5);
        $this->estudiante = Estudiantes::all();
        $this->materia = Materia::all();

        return view('livewire.alumnos.solicitud.solicitar-asesoria', compact('vistaSA'));
    }
    public function limpiar(){
        $this->justificacion = ' ';
        $this->idMateria = ' ';
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

    public function editar($id){
        $Solicitud = Solicitudes::findOrFail($id);

        $this->idSolicituAsesorias= $id;
        $this->justificacion = $Solicitud->nombreMateria;
        $this->estado = $Solicitud->Carreras_idCarreras1;
        $this->idEstudiantes = $Solicitud->Semestres_idSemestres;
        $this->idMateria = $Solicitud->Semestres_idSemestres;

        $this->abrirModal();
    }

    public function borrar($id){
        Solicitudes::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente.');

    }

    Public function guardar(){
        $this->validate();

        $idusuario = auth()->id();
        $idEstudiante = Estudiantes::select('idEstudiantes')->where('Users_id',$idusuario)->get();
        $variableidE= $idEstudiante[0]['idEstudiantes'];

        sol::updateOrCreate(['idSolicituAsesorias' => $this->idSolicituAsesorias],
        [
            'justificacion' => $this->justificacion,
            'estado' =>'revisión',
            'idEstudiantes' =>$variableidE,
            'idMateria' =>$this->idMateria

    ]);
    session()->flash('message',
        $this->idSolicituAsesorias ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
    }
}
