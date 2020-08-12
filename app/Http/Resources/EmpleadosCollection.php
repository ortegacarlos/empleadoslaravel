<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Area;

class EmpleadosCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($element) {
                $area = Area::find($element->area_id);
                return [
                    'id' => $element->id,
                    'nombre' => $element->nombre,
                    'email' => $element->email,
                    'sexo' => ($element->sexo == 'M') ? 'Masculino' : 'Femenino',
                    'area' => $area->nombre,
                    'boletin' => $element->boletin ? 'Si' : 'No',
                    'descripcion' => $element->descripcion
                ];
            })
        ];
    }
}
