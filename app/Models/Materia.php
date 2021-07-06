<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';
    protected $primaryKey = 'idMateria';
    protected $fillable=['nombreMateria','Carreras_idCarreras1','Semestres_idSemestres'];
}
