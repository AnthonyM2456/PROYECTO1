@extends((Auth::user()->role === 1)? 'layouts.appAdmin':'layouts.app')

@section('template_title')
    Product
@endsection

@section('content')
@if (is_null($category))
<h1 class="text-center mt-2">Nuestros Productos</h1>
@else
<h1 class="text-center mt-2">Nuestros Productos - {{$category->title}}</h1>
@endif
<hr>
<br>

<div class="container">
  <div class="row">
    @foreach($products as $pro)
        <div class="col-lg-3">
            <div class="card" style="margin-bottom: 20px; height: auto;">
                <img src="/images/{{ $pro->picture }}"
                     class="card-img-top mx-auto"
                     style="height: 150px; width: 150px;display: block;"
                     alt="{{ $pro->image_path }}">
                     @php
                     $promo = App\Models\Promotion::find($pro->promotion_id);
                     @endphp
                    @if (Auth::user()->role === 0)
                        <div class="card-body">
                            <a href="{{ route('products.show', $pro->id) }}"><h6 class="card-title">{{ $pro->title }}</h6></a>
                            
                            @if (is_null($promo))
                                <p>Price: ${{$pro->price}} </p>
                            @else
                                <p>Price: ${{$pro->price.' ('.$promo->discount.'% de descuento)'}} </p>
                            @endif
                            
                            <form action="{{ route('cart.store') }}" method="POST"> <!-- accion del carrito -->
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $pro->title }}" id="title" name="title">
                                @if (is_null($promo))
                                    <input type="hidden" value="{{ $pro->price}}" id="price" name="price">
                                @else
                                    <input type="hidden" value="{{ $pro->price-($pro->price*$promo->discount/100) }}" id="price" name="price">
                                @endif
                                <input type="hidden" value="{{ $pro->picture }}" id="img" name="img">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <div class="card-footer" style="background-color: white;">
                                    <div class="row">
                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                            <i class="fa fa-shopping-cart"></i> agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                    <div class="card-body">
                        <a href="{{ route('products.show', $pro->id) }}"><h6 class="card-title">{{ $pro->title }}</h6></a>
                        @if (is_null($promo))
                            <p>Price: ${{$pro->price}} </p>
                        @else
                            <p>Price: ${{$pro->price.' ('.$promo->discount.'% de descuento)'}} </p>
                        @endif
                    </div>
                    @endif
                
                
            </div>
        </div>
    @endforeach
</div>
    </div>
</div>
@endsection
