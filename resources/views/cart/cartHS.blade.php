<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Estilos usando Vite -->
    @vite(['resources/css/bootstrap.min.css', 'resources/css/tiny-slider.css', 'resources/css/style.css'])

    <!-- Font Awesome desde CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">HuacoStore<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('products.index') }}">Tienda</a></li>
                    <li><a class="nav-link" href="{{ route('userproduct.index') }}">Mis Compras</a></li>

                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5 align-items-center">
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item me-3">
                        <a class="nav-link d-flex align-items-center" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item me-3">
                        <a class="nav-link d-flex align-items-center" href="{{ route('register') }}">
                            Register
                        </a>
                    </li>
                    @endif
                    @else
                    <!-- Saldo -->
                    <li class="nav-item me-3">
                        <a class="nav-link d-flex align-items-center" href="{{ route('recharge.index') }}">
                            <span class="me-1">{{ Auth::user()->balance }}</span>
                            <i class="fas fa-coins"></i>
                        </a>
                    </li>

                    <!-- Carrito con Dropdown -->
                    <li class="nav-item dropdown me-3">
                        <a id="cartDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/cart.svg" alt="Cart Icon" class="me-1" style="width: 20px; height: 20px;">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown"
                            style="width: 450px; padding: 0; border-color: #9DA0A2;">
                            <!-- Contenido del Dropdown -->
                            <ul class="list-group list-group-flush">
                                @include('partials.cart-drop')
                            </ul>
                        </div>
                    </li>


                    <!-- Dropdown Usuario -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="images/user.svg" alt="User Icon" class="me-1" style="width: 20px; height: 20px;">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <!-- Dropdown Notificaciones -->
                    <li class="nav-item dropdown">
                        <a id="notificationsDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown"
                            style="width: 450px; padding: 0px; border-color: #9DA0A2">
                            <ul class="list-group" style="margin: 20px;">
                                @forelse(App\Models\Notification::where('user_id', Auth::id())->get() as $item)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <b>{{ $item->title }}</b>
                                        </div>
                                        <div class="col-lg-6">
                                            <p>{{ $item->message }}</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('notifications.destroy', $item->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2">
                                            <i class="fa fa-fw fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </li>
                                @empty
                                <li class="list-group-item text-center">
                                    <p>No tienes notificaciones.</p>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </li>

                    @endguest
                </ul>


            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section before-footer-section">
        <div class="container">
            @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}

            </div>
            @endif

            @if(session()->has('error_msg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error_msg') }}

            </div>
            @endif
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    @if(\Cart::getTotalQuantity() > 0)
                    <div class="site-blocks-table">
                        <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartCollection as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="/images/{{ $item->attributes->image }}" alt="Image" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">
                                            <a href="{{ route('products.show', $item->id) }}">{{ $item->name }}</a>
                                        </h2>
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">

                                                <input type="number" class="form-control text-center quantity-amount"
                                                    value="{{ $item->quantity }}" name="quantity" style="width: 70px;">

                                            </div>
                                        </form>
                                    </td>
                                    <td>${{ $item->price * $item->quantity }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="btn btn-black btn-sm">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h4>Tu carrito está vacío!</h4><br>
                    @endif
                </form>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <!-- Continuar Comprando Button -->
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="/products" class="btn btn-outline-black btn-sm btn-block">Continuar Comprando</a>
                        </div>
                    </div>

                    <!-- Coupon Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Cupón</label>
                            <p>Introduce tu código de cupón si tienes uno.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" name="coupon"
                                placeholder="Código de Cupón">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-black" id="applyCouponBtn">Aplicar Cupón</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <!-- Cart Totals -->
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Totales del Carrito</h3>
                                </div>
                            </div>

                            <!-- Subtotal and Total Calculation -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{ \Cart::getSubTotal() }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{ \Cart::getTotal() }}</strong>
                                </div>
                            </div>

                            <!-- Proceed to Checkout Button -->
                            <div class="row">
                                <div class="col-md-12">
                                    @auth
                                    <!-- Si el usuario está autenticado -->
                                    <a href="{{ route('cart.compra') }}"
                                        class="btn btn-black btn-lg py-3 btn-block">Proceder al Pago</a>
                                    @else
                                    <!-- Si el usuario NO está autenticado -->
                                    <a href="{{ route('login') }}" class="btn btn-black btn-lg py-3 btn-block">Iniciar
                                        Sesión para Proceder al Pago</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap">
                        <a href="{{ route('home') }}" class="footer-logo">Artesanías Perú<span>.</span></a>
                    </div>
                    <p class="mb-4">
                        Nuestra tienda celebra la rica herencia cultural del Perú, ofreciendo productos artesanales
                        únicos y de alta calidad. Trabajamos directamente con talentosos artesanos peruanos para llevar
                        lo mejor de nuestras tradiciones a tu hogar.
                    </p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('products.index') }}">Productos</a></li>
                                <li><a href="#">Sobre Nosotros</a></li>
                                <li><a href="#">Contacto</a></li>
                                <li><a href="#">Blog</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Soporte</a></li>
                                <li><a href="#">Preguntas Frecuentes</a></li>
                                <li><a href="#">Política de Devoluciones</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Trabaja con Nosotros</a></li>
                                <li><a href="#">Nuestro Equipo</a></li>
                                <li><a href="#">Política de Privacidad</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('products.show', 1) }}">Cerámica Andina</a></li>
                                <li><a href="{{ route('products.show', 2) }}">Textiles Tradicionales</a></li>
                                <li><a href="{{ route('products.show', 3) }}">Carteras de Alpaca</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>