<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre de Autor') }}
            {{ Form::text('firstname', $autor->firstname, ['class' => 'form-control' . ($errors->has('firstname') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('firstname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!--
        <div class="form-group">
            {{ Form::label('Apellido') }}
            {{ Form::text('lastname', $autor->lastname, ['class' => 'form-control' . ($errors->has('lastname') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('lastname', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    -->
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Registrar Autor</button>
    </div>
</div>