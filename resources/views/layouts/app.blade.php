<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <script src="https://kit.fontawesome.com/18638e2a02.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/products') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @guest
                            @if (Route::has('login'))
                                
                            @endif
                            @if (Route::has('register'))
                                
                            @endif
                        @else
                            <!--
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('recharge.index') }}">{{ __('Recargar saldo') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('userproduct.index') }}">{{ __('Mis compras') }}</a>
                            </li>
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"></i>Categorias</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                        
                                        @foreach(App\Models\Category::with('categories')->where('p_category_id', null)->get() as $category)
                                            @if ($category->categories->count() > 0)
                                                <a href="{{ route('product.cat',$category->id) }}"  class="dropdown-item" value="{{ $category->id }}">{{ $category->title }}</a>
                                                    @foreach ($category->categories as $item)
                                                        <ul>
                                                            <a href="{{ route('product.cat',$item->id) }}" class="dropdown-item">{{$item->title}}</a>
                                                            @foreach ($item->categories as $item2)
                                                        <ul>
                                                            <a href="{{ route('product.cat',$item2->id) }}" class="dropdown-item">{{$item2->title}}</a>
                                                        </ul>
                                                        @endforeach     
                                                        </ul>
                                                        
                                                    @endforeach
                                            @endif
                                        @endforeach
                                    
                                </div>
                                
                            </li>
-->
                        @endguest
                    </ul>

                    
                        
                    


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <!-- COMENTARIO
                            <li>
                                <a class="nav-link" href="#">{{ Auth::user()->balance}} 
                                    <i class="fas fa-coins"></i></a>
                                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                   href="#" role="button" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"
                                >
                                    <span class="badge badge-pill badge-dark">
                                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                                    </span>
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                    <ul class="list-group" style="margin: 20px;">
                                        @include('partials.cart-drop')
                                    </ul>
                                </div>
                                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                    <ul class="list-group" style="margin: 20px;">
                                        @foreach(App\Models\Notification::all() as $item)
                                            @if($item->user_id == Auth::user()->id)
                                            <li class="list-group-item">
                                                <div class="row">
                                                    
                                                    <div class="col-lg-6">
                                                        <b>{{$item->title}}</b>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <p>{{ $item->message }}</p>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </li>
                                            <form action="{{ route('notifications.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                            </form>
                                            @endif
                                            
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
-->
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>
