<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Area;
use App\Rol;
use App\EmpleadoRol;
use App\Http\Resources\EmpleadosCollection;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empleados = Empleado::all();

        if($request->wantsJson()) {
            return new EmpleadosCollection($empleados);
        }

        return view('empleados.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado;
        $areas = Area::getAreas();
        $roles = Rol::getRoles();
        $options = [
            'M' => 'Masculino',
            'F' => 'Femenino',
        ];

        return view('empleados.create', ['empleado' => $empleado, 'areas' => $areas, 'options' => $options, 'roles' => $roles, 'empleado_roles' => []]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataEmpleado = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'area_id' => $request->area,
            'descripcion' => $request->descripcion,
            'boletin' => $request->boletin ? 1 : 0
        ];
        
        if($nuevoEmpleado = Empleado::create($dataEmpleado)) {
            if($request->roles) {
                foreach($request->roles as $rol) {
                    DB::table('empleado_rol')->insertGetId(['empleado_id' => $nuevoEmpleado->id, 'rol_id' => $rol]);
                }
            }
            return redirect('/empleados');
        } else {
            return view('empleados.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if($request->wantsJson()) {
            return new EmpleadosCollection($empleado);
        }

        return view('empleados.show', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
