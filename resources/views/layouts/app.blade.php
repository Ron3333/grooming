<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- <script src="https://kit.fontawesome.com/9af9ce6500.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet"  href="{{ URL::asset('custon.css') }}">
    @livewireStyles
</head>

@if(Route::is('grooming.citas') )
 <body style="background-color: white;" >       
@else
 <body>
@endif
    <div class="container-fluid  header-color">
    </div>

    <div id="app">

        <nav class="navbar pet-nav navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img class="imag-pet" src="/img/pet.png" width="70px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav me-auto nav-pet">

                        <li class="nav-item menu-pet">
                          <a class="nav-link" href="#">Programar Cita</a>
                        </li>
                        <li class="nav-item menu-pet">
                            <a class="nav-link" href="#">Dog Hotel</a>
                        </li>
                        <li class="nav-item menu-pet">
                            <a class="nav-link" href="#">Cursos</a>
                        </li>
                        <li class="nav-item menu-pet">
                            <a class="nav-link" href="#">Cuidado Diario</a>
                        </li>
                        <li class="nav-item menu-pet">
                            <a class="nav-link" href="#">Customer Care</a>
                        </li>
                        <li class="nav-item menu-pet">
                            <a class="nav-link" href="{{ route('grooming.citas') }}">Dog Blog</a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                   
                    <ul class="navbar-nav ms-auto menu-iconos">
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
                                <a id="navbarDropdown" class="nav-link  " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false" v-pre>
                                  <span class="nav-iconos-user"><i class="bi bi-person"></i></span> 
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"> {{ Auth::user()->name }}  </a></li>
                                    <li><a class="dropdown-item" href="#"> Mis Citas </a></li>
                                    <li>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                       </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>          
                                    </li>
                                   <!--  <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                                </ul>                             
                            </li>
                            <li class="nav-item nav-iconos">
                               <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
                            </li>
                              <li class="nav-item nav-iconos">
                            <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
            
            @if(Route::is('grooming.citas') )
              {{ $slot }}
            @endif
        </main>
    </div>
     <!--  FOOTER  -->
    <div class="background-pet-footer text-secondary  py-1 text-lelf">
       <div class="container-fluid">
          <div class="row justify-content-center row-cols-auto  titulo mb-1">
                <div class="col-md-6 text-start mb-5"> <h1 class="display-6 fw-bold text-white">Fallow Alone</h1></div>
                <div class="col-md-6 text-end mb-5"><span style="color: rgb(119 204 52);"><b>@readyforgrooming<b></span></div>
          </div>
           <div class="row justify-content-center  p-pet-footer">
                <div class="col-xs-6 col-md-3 p-1 text-center "><a href="#"><img src="/img/1.jpeg" class="img-fluid "></a></div>
                <div class="col-xs-6 col-md-3 p-1 text-center "><a href="#"><img src="/img/2.jpeg" class="img-fluid "></a></div>
                <div class="col-xs-6 col-md-3 p-1 text-center "><a href="#"><img src="/img/3.jpeg" class="img-fluid "></a></div>
                <div class="col-xs-6 col-md-3 p-1 text-center "><a href="#"><img src="/img/4.jpeg" class="img-fluid "></a></div>
          </div>
          <center><hr class="linea-panel-3 mt-5 mb-5"></center>

          <div class="row justify-content-center titulo mb-1 p-pet-footer footer-pet-line-height footer-pet">
           
                <div class="col-xs-12 col-sm-6 col-md-3 ">
                  <div class="pet-posicion"><img src="/img/pet2.png" width="130px"></div>
                      <ul class="list-unstyled text-small icon-rrss pet-posicion " >
                        <li class=" icon-rrss-pet"><a class="link-secondary" href="#"><i class="bi bi-instagram"></i></a></li>
                        <li class=" icon-rrss-pet"><a class="link-secondary" href="#"><i class="bi bi-facebook"></i></a></li>
                        <li class=" icon-rrss-pet"><a class="link-secondary" href="#"><i class="bi bi-youtube"></i></a></li>
                        <li class=" icon-rrss-pet"><a class="link-secondary" href="#"><i class="bi bi-twitter"></i></a></li>
                      </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 mostrar-1 ">
                  <h5>Experience</h5>
                      <ul class="list-unstyled text-small">
                        <li><a class="link-secondary" href="#">Dog Meal</a></li>
                        <li><a class="link-secondary" href="#">Sample Packs</a></li>
                        <li><a class="link-secondary" href="#">Fresh Treats</a></li>
                        <li><a class="link-secondary" href="#">Natural Chews</a></li>
                        <li><a class="link-secondary" href="#">Gear Shop</a></li>
                        <li><a class="link-secondary" href="#">Gift Cards</a></li>
                        <li><a class="link-secondary" href="#">Shop All</a></li>
                        <li><a class="link-secondary" href="#">The Dog Zone</a></li>
                        <li><a class="link-secondary" href="#">Get Joy Health</a></li>
                      </ul>
                </div> 
                <div class="col-xs-12 mostrar-2 text-center ">
                    <div  class="btn-group">
                     
                          <button class="btn btn-secondary btn-lg dropdown-toggle boton-1 " type="button" data-bs-toggle="dropdown"aria-expanded="false">Experience </button>
                 
                          <ul class="dropdown-menu list-unstyled text-small">
                            <li><a class="dropdown-item link-secondary" href="#">Dog Meal</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Sample Packs</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Fresh Treats</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Natural Chews</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Gear Shop</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Gift Cards</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Shop All</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">The Dog Zone</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Get Joy Health</a></li>
                          </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2  mostrar-1 ">
                  <h5>Support</h5>
                      <ul class="list-unstyled text-small">
                        <li><a class="link-secondary" href="#">Build A Meal Plan</a></li>
                        <li><a class="link-secondary" href="#">Customer Care</a></li>
                        <li><a class="link-secondary" href="#">FAQ</a></li>
                        <li><a class="link-secondary" href="#">Log In</a></li>
                        <li><a class="link-secondary" href="#">Creat Account</a></li>
                        <li><a class="link-secondary" href="#">Referral Program</a></li>
                        <li><a class="link-secondary" href="#">Careers</a></li>
                        <li><a class="link-secondary" href="#">Wholesale Inquiries</a></li>
                        <li><a class="link-secondary" href="#">Partner Program</a></li>
                      </ul>
                </div>
                <div class="col-xs-12 mostrar-2 text-center ">
                    <div  class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle boton-2 " type="button" data-bs-toggle="dropdown"aria-expanded="false">Support </button>
                          <ul class="dropdown-menu list-unstyled text-small">
                            <li><a class="dropdown-item link-secondary" href="#">Build A Meal Plan</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Customer Care</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">FAQ</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Log In</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Creat Account</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Referral Program</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Careers</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Wholesale Inquiries</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Partner Program</a></li>
                          </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 mostrar-1">
                  <h5>Policies</h5>
                      <ul class="list-unstyled text-small">
                        <li><a class="link-secondary" href="#">Privacy Policy</a></li>
                        <li><a class="link-secondary" href="#">Refund Policy</a></li>
                        <li><a class="link-secondary" href="#">Shipping Policy</a></li>
                        <li><a class="link-secondary" href="#">Terms of Service</a></li>
                      </ul>
                </div>
                  <div class="col-xs-12 mostrar-2 text-center ">
                    <div  class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle boton-3 " type="button" data-bs-toggle="dropdown"aria-expanded="false">Policies </button>
                          <ul class="dropdown-menu list-unstyled text-small">
                            <li><a class="dropdown-item link-secondary" href="#">Privacy Policy</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Refund Policy</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Shipping Policy</a></li>
                            <li><a class="dropdown-item link-secondary" href="#">Terms of Service</a></li>
                          </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 ">
                  <h5>Keep in Touch</h5>
                  <p>Subscribe to our newsletter for the latest in wellness, sale events, and doggo cuteness.</p>
                   <input class="form-control mb-2" type="text" placeholder="Enter your email" aria-label="default">
                     <div class="d-grid gap-2 ">
                        <button type="button" class="btn btn-light"><b>Suscribe</b></button>
                     </div>
                </div>
            
          </div>

         <center><hr class="linea-panel-3 mt-5 mb-5"></center>   
          <div class="row justify-content-center titulo mb-1">
             <div class="col-md-11"> 
               <p style="color:white; font-weight: 100;"> Copyright © 2023 Ready For Grooming LLC. All Rights Reserved. </p>    
             </div>
          </div>  
       </div>
    </div> 
     <livewire:grooming.create-pet/>

     @livewireScripts
  
 
</body>
</html>
