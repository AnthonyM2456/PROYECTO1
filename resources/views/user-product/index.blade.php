@extends('layouts.app')

@section('template_title')
    User Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tus Compras') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('userproduct.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Producto</th>
                                        <th>Precio</th>
                                        <th>Fecha de compra</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userProducts as $userProduct)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            @php
                                                $product = App\Models\Product::find($userProduct->product_id);
                                                $promo = App\Models\Promotion::find($product->promotion_id);
                                            @endphp
											<td>{{ $product->title }}</td>
                                            @if (is_null($promo))
                                                <td>{{ $product->price }}</td>
                                            @else
                                                <td>{{ $product->price-($product->price*$promo->discount/100) }}</td>
                                            @endif
                                            <td>{{ $userProduct->created_at }}</td>
                                            
                                            
                                            <td>
                                                <form action="{{ route('userproduct.destroy',$userProduct->id) }}" method="POST">
                                                    
                                                    <a class="btn btn-sm btn-primary " href="{{ route('products.show',$userProduct->product_id) }}"><i class="fa fa-fw fa-eye"></i> Ver producto</a>
                                                    <a class="btn btn-sm btn-primary " href="/images/{{ $product->picture }}"  download="{{ $product->picture }}"> <i class="fa fa-download"></i>Descargar</a>
                                                    <!--<a class="btn btn-sm btn-success" href="{{ route('userproduct.edit',$userProduct->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>-->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $userProducts->links() !!}
            </div>
        </div>
    </div>
@endsection
