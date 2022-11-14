@extends((Auth::user()->role === 1)? 'layouts.appAdmin':'layouts.app')

@section('template_title')
    Product
@endsection

@section('content')
<h1 class="text-center mt-2">Nuestros Productos</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-6" style="display:flex">
            @foreach ($products as $product)
            <div class="card m-2 p-2" style="width: 18rem;">
                <img src="images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  @php
                    $promotion = App\Models\Promotion::find($product->promotion_id);
                  @endphp

                    @if (is_null($promotion))
                        <h5 class="card-title">Price: ${{ $product->price }}</h5>
                        @else
                        <h5 class="card-title">Price: ${{ $product->price-($product->price*$promotion->discount/100).' ('.$promotion->discount.'% de descuento)' }}</h5>
                    @endif
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver detalles</a>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
