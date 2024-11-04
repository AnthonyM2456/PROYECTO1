@extends('layouts.appAdmin')

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
                        <th scope="col">Acciones</th> <!-- Nueva columna para agrupar acciones -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <!-- Agrupación de botones de acción en una sola celda -->
                            <a href="{{ route('products.edit', $product->id)}}" class="btn btn-sm btn-success"><i
                                    class="fa fa-fw fa-edit"></i>Editar</a>
                            <a href="{{ route('products.show', $product->id)}}" class="btn btn-sm btn-primary"><i
                                    class="fa fa-fw fa-eye"></i>Ver</a>
                            <form action="{{ route('admin.product.delete', $product->id)}}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i
                                        class="fa fa-fw fa-trash"></i>Borrar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end"><a href="{{ route('products.create')}}"
            class="btn btn-success btn-circle btn-xl ">Crear nuevo producto</a></div>


    <!--<button type="button" class="btn btn-success btn-circle btn-xl"><i class="glyphicon glyphicon-link">asdasdasda</i></button>-->
</div>


@endsection