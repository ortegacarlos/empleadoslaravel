<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public $fillable = ['nombre', 'email', 'sexo', 'area_id', 'boletin', 'descripcion'];

    public function url()
    {
        return $this->id ? 'empleados.update' : 'empleados.store';
    }

    public function method()
    {
        return $this->id ? 'PUT' : 'POST';
    }
}
