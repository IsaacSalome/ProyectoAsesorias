<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorariosDocentes extends Model
{
    use HasFactory;
    protected $table = 'horariosdocentes';
    protected $primaryKey = 'idHorariosAlumnos';
    protected $fillable=['Horarios_idHorarios','Docentes_idDocentes'];
}
