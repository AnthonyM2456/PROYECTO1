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
                        <h1>Nuestros Productos</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <div class="product-item" href="#">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ asset('images/' . $product->picture) }}" class="img-fluid product-thumbnail">
                        </a>
                        <h3 class="product-title">{{ $product->title }}</h3>

                        @php
                        $promo = $product->promotion;
                        @endphp

                        @if ($promo)
                        <strong class="product-price">
                            ${{ number_format($product->price - ($product->price * $promo->discount / 100), 2) }}
                            <span class="text-danger">({{ $promo->discount }}% off)</span>
                        </strong>
                        @else
                        <strong class="product-price">${{ number_format($product->price, 2) }}</strong>
                        @endif

                        <!-- Formulario para agregar al carrito -->
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="title" value="{{ $product->title }}">
                            <input type="hidden" name="img" value="{{ $product->picture }}">
                            <input type="hidden" name="quantity" value="1">

                            @if ($promo)
                            <!-- Si hay una promoción, calculamos el precio con el descuento -->
                            <input type="hidden" name="price"
                                value="{{ $product->price - ($product->price * $promo->discount / 100) }}">
                            @else
                            <!-- Si no hay promoción, usamos el precio normal -->
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            @endif
                            <!-- Botón con ícono dentro de un span -->
                            <button type="button" class="btn-hidden" title="Agregar al carrito"
                                onclick="this.closest('form').submit();">
                                <span class="icon-cross">
                                    <img src="{{ asset('images/cross.svg') }}" class="img-fluid">
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
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