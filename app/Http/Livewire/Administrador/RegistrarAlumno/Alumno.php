<?php

namespace App\Http\Livewire\Administrador\RegistrarAlumno;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Semestres;
use App\Models\Carreras;
use App\Models\Estudiantes;
use App\Models\Modalidades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\vistas\vistaalumnos;

use App\Models\User;

class Alumno extends Component
{
    use WithPagination;

    public $modal = false;
    public  $carreras, $semestres,$idEstudiantes, $id_user ,$modalidades, $name, $nombre, $numeroControl,$pass ,$apellidos,$grupo,$Carreras_idCarreras,$Semestres_idSemestres,$Modalidades_idModalidades;

    public function render()
    {
        $vistaAlumnos = vistaalumnos::paginate(5);

        $this->semestres= Semestres::all();
        $this->carreras= Carreras::all();
        $this->modalidades= Modalidades::all();

        return view('livewire.administrador.registrar-alumno.alumno',compact('vistaAlumnos'));
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
        $this->Carreras_idCarreras = ' ';
        $this->Semestres_idSemestres= ' ';
    }

    public function editar($id){
       // echo('<input type=text>');
        $usuario = User::findOrFail($id);
      //  echo $usuario;
        $estudiante = Estudiantes::Where('Users_id',$id)->get();

        $this->id_user= $id;
        $this->idEstudiantes= $estudiante[0]['idEstudiantes'];

        $this->name = $usuario->name;
        $this->numeroControl = $usuario->email;
        $this->pass = $usuario->password;

        $this->nombre =$estudiante[0]['nombre'];
        $this->apellidos = $estudiante[0]['apellido'];
        $this->grupo = $estudiante[0]['grupo'];

        $this->Carreras_idCarreras = $estudiante[0]['Carreras_idCarreras'];
        $this->Semestres_idSemestres = $estudiante[0]['Semestres_idSemestres'];
        $this->Modalidades_idModalidades = $estudiante[0]['Semestres_idSemestres'];


        $this->abrirModal();
    }

    public function borrar($id){
       // User::find($id)->delete();
       // $estudiante = Estudiantes::Where('Users_id',$id)->get();
    }

    Public function guardar(){
    
        if($this->id_user != null){
           User::where('id_user', $this->id_user)
           ->update([                
            'id_user' => $this->id_user,
            'name' => $this->nombre,
            'email' => $this->numeroControl,
            'password' => $this->pass,
            ]);
            
            $estudiante = Estudiantes::Where('Users_id',$this->id_user)->get();

            Estudiantes::where('idEstudiantes',$estudiante[0]['idEstudiantes'])
            ->update([
                'idEstudiantes' => $this->idEstudiantes,
                'nombre' => $this->nombre,
                'apellido' => $this->apellidos,
                'grupo' => $this->grupo,
    
                'Carreras_idCarreras' => $this->Carreras_idCarreras,
                'Semestres_idSemestres' =>$this->Semestres_idSemestres,
                'Modalidades_idModalidades' => $this->Modalidades_idModalidades,
                'Users_id' =>  $this->id_user
             ]);
             $this->cerrarModal();
             $this->limpiar();
        }

        else {
            $user = ([
                'name' => $this->nombre,
                'email' => $this->numeroControl,
                'password' => Hash::make($this->pass),
            ]);
             User::create($user);


             $lastid = DB::table('users')->latest()->first();
      
            $estudiante = ([
            'nombre' => $this->nombre,
            'apellido' => $this->apellidos,
            'grupo' => $this->grupo,

            'Carreras_idCarreras' => $this->Carreras_idCarreras,
            'Semestres_idSemestres' =>$this->Semestres_idSemestres,
            'Modalidades_idModalidades' => $this->Modalidades_idModalidades,
            'Users_id' =>  $lastid->id_user
        ]);

        Estudiantes::create($estudiante);
        $this->cerrarModal();
        $this->limpiar();
        }

/*
    User::updateOrCreate(['id_user' => $this->id_user],
        [
            'name' => $this->nombre,
            'email' => $this->numeroControl,
            'password' =>$this->pass,
    ]);

    $data = DB::table('users')->latest()->first();

    Estudiantes::updateOrCreate(['idEstudiantes' => $this->idEstudiantes],
        [
            'nombre' => $this->nombre,
            'apellido' => $this->apellidos,
            'grupo' => $this->grupo,

            'Carreras_idCarreras' => $this->Carreras_idCarreras,
            'Semestres_idSemestres' =>$this->Semestres_idSemestres,
            'Modalidades_idModalidades' => $this->Modalidades_idModalidades,
            'Users_id' =>  $data->id_user

    ]);

       // session()->flash('message',
       // $this->idMateria ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
        $this->limpiar();*/
    }
}
