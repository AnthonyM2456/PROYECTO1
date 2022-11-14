
@extends((Auth::user()->role === 1)? 'layouts.appAdmin':'layouts.app')



@section('content')

<h1 class="text-center mt-2">{{ $product->title }} | Detalles</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-9" style="display:flex">

            <div class="container m-2 p-2">
                <img src="/images/{{ $product->picture }}" height="450px" alt="...">
                <div class="container m-2 p-2">
                  <h2>{{ $product->title }}</h2>
                  @if (is_null($promotion))
                    <h3>Precio: ${{ $product->price }}</h3>  
                  @else 
                    <h3>Precio: ${{ $product->price-($product->price*$promotion->discount/100).' ('.$promotion->discount.'% de descuento)'}}</h3>
                  @endif
                  <h4>Categoria: {{$product->category->title}}</h4>
                  <h4>Autor: {{$product->autor->firstname.' '.$product->autor->lastname}}</h4>
                  <hr>
                  <p>{{ $product->description }}</p>
                    @if (Auth::user()->role === 1)
                        <a href="{{ route('admin.product.index') }}" class="btn btn-success">Regresar</a>
                    @else
                        <a href="{{ route('products.index') }}" class="btn btn-success">Regresar</a>
                    @endif
                  
                  <!--<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>-->
                </div>
              </div>

        </div>


        <div class="col-md-3">
            <h3>Todos los Comentarios</h3>

            <div class="comments p-2 m-2" style="background-color: rgb(232, 251, 246)">
                @foreach ($product->comments as $comment)
                    <h5>{{ $comment->comment }} ( {{ $comment->rating }} )</h5>
                    <hr>
                @endforeach
            </div>


           <h3>Añadir Comentario...</h3>

           <div class="container m-2 p-2">

            <form action="" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="comment" class="form-label">Comentarios</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Tu Comentario">
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Calificación</label>
                    <input type="number" class="form-control" name="rating" id="rating" placeholder="Tu Calificación">
                </div>

                <button type="submit" id="addCommentBtn" class="btn btn-success">Comentar</button>

            </form>

            </div>



        </div>
    </div>
</div>


<script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
})



// Add Comment To Product By Id

$("#addCommentBtn").click(function(e){

    //e.preventDefault();
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
        url: "/products/"+$id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    });




});




// Load Comment By Product Id

// function allComments() {

//     var id = $('#id').val();

//     $.ajax({
//         type: "GET",
//         dataType: "json",
//         url: "/products/"+id,
//         success: function(response) {
//             console.log(response);

//             var data = "";

//             $.each(response, function(key, value){
//                 console.log(value);

//                 data = data + "<div>"

//                     data = data + "<p>"+value.comment+"</p>";
//                     data = data + "<p>"+value.rating+"</p>";

//                 data = data + "</div>"

//             })

//             $('.comment_holder').html(data);
//         },
//         error: function(error) {
//             console.log(error);
//         }
//     })


// }

// allComments();


</script>

@endsection


























{{-- @extends('layouts.app')

@section('content')

<h1 class="text-center">Show Single Product</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-8" style="display:flex">

            <div class="card m-2 p-2" style="width: 18rem;">
                <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title">Price: ${{ $product->price }}</h5>
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <a href="{{ route('product.index') }}" class="btn btn-primary">go Back</a>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>

        </div>


        <div class="col-md-4">
            <h3>Todos los Comentarios</h3>

            @foreach ($product->comments as $comment)
                <p>{{ $comment->comment }}</p>
                <p>{{ $comment->rating }}</p>
            @endforeach

           <h3>Añadir Comentario...</h3>

           <div class="conatiner">

            <form action="" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="comment" class="form-label">Comentario</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Calificación</label>
                    <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" placeholder="Enter Rating">
                </div>

                  <button type="submit" id="addCommentBtn" onclick="addComment($product->id)" class="btn btn-success">comment</button>

            </form>

           </div>



        </div>
    </div>
</div>


<script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
})


function addComment($id) {
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
        url: "/products/"+$id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    })
}





</script>


@endsection --}}
