@extends('layouts.appAdmin')

@section('template_title')
    Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva Catengoria') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Categoria relacionada</th>
										<th>Título</th>
										<th>Descripción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    @php
                                        $cat = \App\Models\Category::where(['id' => $category->p_category_id])->first()
                                    @endphp 
                                            <td>{{ ++$i }}</td>
											<td>{{ $cat->title ?? ' ' }}</td>
                                            
                                            
											<td>{{ $category->title }}</td>
											<td>{{ $category->description }}</td>
                                            
                                            <td>
                                                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                                    <!--<a class="btn btn-sm btn-primary " href="{{ route('categories.show',$category->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>-->
                                                    <a class="btn btn-sm btn-success" href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
