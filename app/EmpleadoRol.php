<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmpleadoRol extends Model
{
    public $fillable = ['empleado_id', 'rol_id'];

    public static function getEmpleadoRoles($id)
    {
        $rolesFind = DB::table('empleado_rol')->where('empleado_id', $id)->get();
        $rolesAll = [];

        foreach($rolesFind as $rolFind) {
            $rolesAll[] = $rolFind->rol_id;
        }

        return $rolesAll;
    }
}
