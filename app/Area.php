<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public static function getAreas()
    {
        $areas = new Area;
        $areasFind = $areas->all();
        $areasAll = [];

        foreach($areasFind as $areaFind) {
            $areasAll[$areaFind['id']] = $areaFind['nombre'];
        }

        return $areasAll;
    }

    public static function getIdAreas()
    {
        $areas = new Area;
        $areasFind = $areas->all();
        $areasAll = [];

        foreach($areasFind as $areaFind) {
            $areasAll[] = $areaFind['id'];
        }

        return $areasAll;
    }
}
