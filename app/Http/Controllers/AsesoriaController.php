<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asesoias;
use Illuminate\Support\Facades\DB;

class AsesoriaController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //->except('_method','_token')
        $datos=array_values($request->except('_token'));
        print_r( $datos);
        DB::select('call calendarizacionAsesoria(?,?,?,?,?,?,?)',$datos);

        return redirect()->route('ProgramacionAsesoria')->with('Mensaje','Asesoria Prograda con éxito');;

      //  return redirect('/programacion-Asesoria');

       //DB::select('CALL view_horarioHalumno('.$Asesoria.')');

    }

    
}
