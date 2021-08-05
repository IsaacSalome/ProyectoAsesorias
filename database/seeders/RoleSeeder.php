<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleADMIN = Role::create(['name' => 'Admin']);
        $roleDOCENTE = Role::create(['name' => 'Docente']);
        $roleALUMNO = Role::create(['name' => 'Alumno']);
        $roleDIVISION = Role::create(['name' => 'Division']);

        Permission::create(['name'=> 'materias'])->syncRoles([$roleADMIN]);
        Permission::create(['name'=> 'RegistroAlumnos'])->syncRoles([$roleADMIN]);
        Permission::create(['name'=> 'RegistroDocente'])->syncRoles([$roleADMIN]);
        Permission::create(['name'=> 'HorarioMaterias'])->syncRoles([$roleADMIN]);

        Permission::create(['name'=> 'SolicitarAsesoria'])->syncRoles([$roleALUMNO]);
        Permission::create(['name'=> 'HorarioAlumno'])->syncRoles([$roleALUMNO]);

        Permission::create(['name'=> 'RevisionAsesoria'])->syncRoles([$roleDIVISION]);
        Permission::create(['name'=> 'ProgramacionAsesoria'])->syncRoles([$roleDIVISION]);
        Permission::create(['name'=> 'CrearProgramacion'])->syncRoles([$roleDIVISION]);

        Permission::create(['name'=> 'HorarioDocente'])->syncRoles([$roleDOCENTE]);


    }
}
