<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Area;
use App\Rol;
use App\EmpleadoRol;
use App\Http\Resources\EmpleadosCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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

        \Alert::message('Los campos con * son obligatorios', 'info');

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
        $areas = Area::getIdAreas();
        $roles = Rol::getIdRoles();

        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'sexo' => 'required',
            'area' => ['required',
                Rule::in($areas)],
            'descripcion' => 'required',
            'roles.*' => ['required',
                Rule::in($areas)],
        ]);

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

            \Alert::success('La información del empleado ' . $request->nombre . ' ha sido guardada satisfactoriamente.')
                ->button('Ver empleados', '/empleados', 'primary');

            return view('alert');
        } else {
            \Alert::message('La información no ha podido ser guardada', 'danger');

            return view('empleados.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        $area = Area::find($empleado->area_id);
        $empleado->sexo = ($empleado->sexo == 'M') ? 'Masculino' : 'Femenino';
        $empleado->area = $area->nombre;
        $empleado->boletin = $empleado->boletin ? 'Si' : 'No';

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
        $empleado = Empleado::find($id);
        $areas = Area::getAreas();
        $roles = Rol::getRoles();
        $empleadoRoles = EmpleadoRol::getEmpleadoRoles($id);
        $options = [
            'M' => 'Masculino',
            'F' => 'Femenino',
        ];

        \Alert::message('Los campos con * son obligatorios', 'info');

        return view('empleados.edit', ['empleado' => $empleado, 'areas' => $areas, 'options' => $options, 'roles' => $roles, 'empleado_roles' => $empleadoRoles]);
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
        $areasid = Area::getIdAreas();
        $rolesid = Rol::getIdRoles();

        $validatedData = $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'sexo' => 'required',
            'area' => ['required',
                Rule::in($areasid)],
            'descripcion' => 'required',
            'roles.*' => ['required',
                Rule::in($rolesid)],
        ]);

        $empleado = Empleado::find($id);
        $areas = Area::getAreas();
        $roles = Rol::getRoles();
        $empleadoRoles = EmpleadoRol::getEmpleadoRoles($id);
        $options = [
            'M' => 'Masculino',
            'F' => 'Femenino',
        ];

        $empleado->nombre = $request->nombre;
        $empleado->email = $request->email;
        $empleado->sexo = $request->sexo;
        $empleado->area_id = $request->area;
        $empleado->boletin = $request->boletin ? 1 : 0;
        $empleado->descripcion = $request->descripcion;

        if($empleado->save()) {
            DB::table('empleado_rol')
                ->where('empleado_id', $id)
                ->delete();
            if($request->roles) {
                foreach($request->roles as $rol) {
                    DB::table('empleado_rol')
                        ->updateOrInsert(
                            ['empleado_id' => $id],
                            ['rol_id' => $rol]);
                }
            }

            \Alert::success('La información del empleado ' . $request->nombre . ' ha sido actualizada satisfactoriamente.')
                ->button('Ver empleados', '/empleados', 'primary');

            return view('alert');
        } else {
            \Alert::message('La información no ha podido ser actualizada', 'danger');

            return view('empleados.edit', ['empleado' => $empleado, 'areas' => $areas, 'options' => $options, 'roles' => $roles, 'empleado_roles' => $empleadoRoles]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('empleado_rol')
            ->where('empleado_id', $id)
            ->delete();
        Empleado::destroy($id);

        return redirect('/empleados');
    }
}
