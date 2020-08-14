{!! Alert::render() !!}
{!! Form::open(['route' => [$empleado->url(), $empleado->id], 'method' => $empleado->method(), 'class' => 'app-form']) !!}
    <div class="form-group row">
        {!! Form::label('nombre', 'Nombre completo *', ['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
        <div class="col-md-6">
            {!! Form::text('nombre', $empleado->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre completo del empleado', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('email', 'Correo electrónico *', ['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
        <div class="col-md-6">
            {!! Form::email('email', $empleado->email, ['class' => 'form-control', 'placeholder' => 'Correo electrónico', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('sexo', 'Sexo *', ['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
        <div class="col-md-6">
            <div class="form-check">
                {!! Form::radio('sexo', 'M', ($empleado->sexo == 'M') ? true : false, ['id' => 'sexo_m', 'class' => 'form-check-input', 'required' => 'required']) !!}
                {!! Form::label('sexo_m', 'Masculino', ['for' => 'sexo_m', 'class' => 'form-check-label']) !!}
            </div>
            <div class="form-check">
                {!! Form::radio('sexo', 'F', ($empleado->sexo == 'F') ? true : false, ['id' => 'sexo_f', 'class' => 'form-check-input']) !!}
                {!! Form::label('sexo_f', 'Femenino', ['for' => 'sexo_f', 'class' => 'form-check-label']) !!}
            </div>
            <!--{!! Form::radios('sexo', $options) !!}-->
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('area', 'Área *', ['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
        <div class="col-md-6">
            {!! Form::select('area', $areas, $empleado->area_id, ['class' => 'form-control', 'placeholder' => 'Selecione un área', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('descripcion', 'Descripción *', ['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
        <div class="col-md-6">
            {!! Form::textarea('descripcion', $empleado->descripcion, ['class' => 'form-control', 'placeholder' => 'Descripción de la experiencia del empleado', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            {!! Form::checkboxes('boletin', [1 => 'Desea recibir boletín informativo'], [$empleado->boletin], ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('roles', 'Roles *', ['class' => 'col-md-4 col-form-label text-md-right font-weight-bold']) !!}
        <div class="col-md-6">
            {!! Form::checkboxes('roles', $roles, $empleado_roles, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
    </div>
{!! Form::close() !!}