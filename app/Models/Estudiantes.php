<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'idEstudiantes';
    protected $fillable=['nombre','apellido','grupo','Carreras_idCarreras','Semestres_idSemestres','Modalidades_idModalidades','Users_id'];
}
