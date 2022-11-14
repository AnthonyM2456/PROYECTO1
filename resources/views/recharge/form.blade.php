<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Numero de Tarjeta') }}
            {{ Form::text('card_number', $card->card_number, ['class' => 'form-control' . ($errors->has('card_number') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('card_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de Propietario') }}
            {{ Form::text('cardholder_name', $card->cardholder_name, ['class' => 'form-control' . ($errors->has('cardholder_name') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('cardholder_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Expiración') }}
            {{ Form::date('expiration_date', $card->expiration_date, ['class' => 'form-control' . ($errors->has('expiration_date') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('expiration_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CVV') }}
            {{ Form::text('CVV', $card->CVV, ['class' => 'form-control' . ($errors->has('CVV') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('CVV', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Saldo') }}
            {{ Form::text('balance', $recharge->balance, ['class' => 'form-control' . ($errors->has('balance') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('balance', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>