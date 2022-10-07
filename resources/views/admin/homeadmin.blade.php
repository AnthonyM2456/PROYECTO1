@extends('layouts.app')

@section('content')

<h1 class="text-center">Tabla de productos - Administrador

</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Título</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td><a href="{{ route('product.edit', $product->id)}}" class="btn btn-primary">Editar</a></td>
                                <td><a href="{{ route('product.show', $product->id)}}" class="btn btn-secondary">Ver</a></td>
                                <td>
                                    
                                    <form action="{{ route('admin.product.delete', $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    
    <div class="d-grid gap-2 d-md-flex justify-content-md-end"><a href="{{ route('product.create')}}" class="btn btn-success btn-circle btn-xl " >Create</a></div>
    <!--<button type="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-link">asdasdasda</i></button>-->
</div>


@endsection
