<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Subir Imagen') }}
            {{ Form::file('picture', $product->picture, ['class' => 'form-control' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
            {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Titulo') }}
            {{ Form::text('title', $product->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::text('price', $product->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción') }}
            {{ Form::text('description', $product->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => ' ']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Categoria relacionada') }}
            {{ Form::select('category_id', $category, $product->category_id, ['class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => ' - ']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Autor') }}
            {{ Form::select('autor_id', $autor, $product->autor_id, ['class' => 'form-control' . ($errors->has('autor_id') ? ' is-invalid' : ''), 'placeholder' => ' - ']) }}
            {!! $errors->first('autor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Promoción') }}
            {{ Form::select('promotion_id' , $promotion , $product->promotion_id, ['class' => 'form-control' . ($errors->has('promotion_id') ? ' is-invalid' : ''), 'placeholder' => ' - ']) }}
            {!! $errors->first('promotion_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!--[$promotion[0].'%'] -->
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Publicar producto</button>
    </div>
</div>