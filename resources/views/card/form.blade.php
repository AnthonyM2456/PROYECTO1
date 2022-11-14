<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('card_number') }}
            {{ Form::text('card_number', $card->card_number, ['class' => 'form-control' . ($errors->has('card_number') ? ' is-invalid' : ''), 'placeholder' => 'Card Number']) }}
            {!! $errors->first('card_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cardholder_name') }}
            {{ Form::text('cardholder_name', $card->cardholder_name, ['class' => 'form-control' . ($errors->has('cardholder_name') ? ' is-invalid' : ''), 'placeholder' => 'Cardholder Name']) }}
            {!! $errors->first('cardholder_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('expiration_date') }}
            {{ Form::date('expiration_date', $card->expiration_date, ['class' => 'form-control' . ($errors->has('expiration_date') ? ' is-invalid' : ''), 'placeholder' => 'Expiration Date']) }}
            {!! $errors->first('expiration_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CVV') }}
            {{ Form::text('CVV', $card->CVV, ['class' => 'form-control' . ($errors->has('CVV') ? ' is-invalid' : ''), 'placeholder' => 'Cvv']) }}
            {!! $errors->first('CVV', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Balance') }}
            {{ Form::text('Balance', $card->Balance, ['class' => 'form-control' . ($errors->has('Balance') ? ' is-invalid' : ''), 'placeholder' => 'Balance']) }}
            {!! $errors->first('Balance', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>