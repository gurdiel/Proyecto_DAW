@extends("layouts.plantilla")


@section("contenido")

<div class="container div1">
        <nav class="navbar navbar-expand-lg navbar-info">
        <a class="navbar-brand" href="#">KTC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">asdfsadfa</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            @if (Route::has('login'))
            @auth  
            <li class="nav-item active">
                <a class="nav-link font-weight-bold" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link font-weight-bold" href=" {{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link font-weight-bold" href="{{ route('register') }}">Registro</a>
            </li>
            @endif
            @endauth
            </ul>
            @endif
        </div>
    </nav>
</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
                                <div class="col mb-4">
                                <div class="card h-100">
                                <img src="" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                                </div>
                                </div>
                                <div class="col mb-4">
                                <div class="card h-100">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a short card.</p>
                                </div>
                                </div>
                                </div>
                                <div class="col mb-4">
                                <div class="card h-100 specialCard">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                </div>
                                </div>
                                <div class="col mb-4">
                                <div class="card h-100 divColor">
                                <img src="{{asset('images/pi.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                                </div>
                                </div>
    </div>
</div>

@endsection