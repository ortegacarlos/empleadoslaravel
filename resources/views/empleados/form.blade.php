{!! Form::open(['route' => [$empleado->url(), $empleado->id], 'method' => $empleado->method(), 'class' => 'app-form']) !!}
    <div>
        {!! Form::label('nombre', 'Nombre completo *') !!}
        {!! Form::text('nombre', $empleado->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre completo del empleado', 'required' => 'required']) !!}
    </div>

    <div>
        {!! Form::label('email', 'Correo electrónico *') !!}
        {!! Form::email('email', $empleado->email, ['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required' => 'required']) !!}
    </div>

    <div>
        {!! Form::label('sexo', 'Sexo *') !!}
        {!! Form::radios('sexo', $options) !!}
    </div>

    <div>
        {!! Form::label('area', 'Área *') !!}
        {!! Form::select('area', $areas, $empleado->area_id, ['class' => 'form-control', 'placeholder' => 'Selecione un área', 'required' => 'required']) !!}
    </div>

    <div>
        {!! Form::label('descripcion', 'Descripción *') !!}
        {!! Form::textarea('descripcion', $empleado->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripción de la experiencia del empleado', 'required' => 'required']) !!}
    </div>

    <div>
        {!! Form::checkboxes('boletin', [1 => 'Desea recibir boletín informativo'], [$empleado->boletin], ['class' => 'form-control', 'required' => 'required']) !!}
    </div>

    <div>
        {!! Form::label('roles', 'Roles *') !!}
        {!! Form::checkboxes('roles', $roles, $empleado_roles, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    
    <div>
        <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
{!! Form::close() !!}