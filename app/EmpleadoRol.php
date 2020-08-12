<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoRol extends Model
{
    public $fillable = ['empleado_id', 'rol_id'];

    public static function getEmpleadoRoles()
    {
        $roles = new Rol;
        $rolesFind = $roles->all();
        $rolesAll = [];

        foreach($rolesFind as $rolFind) {
            $rolesAll[$rolFind['id']] = $rolFind['nombre'];
        }

        return $rolesAll;
    }
}
