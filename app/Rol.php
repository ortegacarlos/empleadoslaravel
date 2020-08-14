<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rol extends Model
{
    public static function getRoles()
    {
        $rolesFind = DB::table('roles')->get();
        $rolesAll = [];

        foreach($rolesFind as $rolFind) {
            $rolesAll[$rolFind->id] = $rolFind->nombre;
        }

        return $rolesAll;
    }

    public static function getIdRoles()
    {
        $rolesFind = DB::table('roles')->get();
        $rolesAll = [];

        foreach($rolesFind as $rolFind) {
            $rolesAll[] = $rolFind->id;
        }

        return $rolesAll;
    }
}
