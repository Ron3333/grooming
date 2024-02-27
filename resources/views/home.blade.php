@extends('layouts.app')

@section('content')

<div class="container-fluid ">
    <div class="row justify-content-center titulo mb-4">
          <div class="col-md-11">
              <div class="row justify-content-between">
                  <div align="left" class="col-md-6"><h1 >Mis Citas</h1></div>
                  <div align="right" class="col-md-6">
                        <a class="col-md-6" style="color: rgb(119 204 52);"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                 </div>
              </div>
          </div>
    </div>
    <center><hr class="linea-panel"></center>
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-grooming mb-2 mt-4 ">
                <div class="card-body card-pet cita-body">
                    <h2 class="mb-4 mt-3">Grooming</h2>
                    <center><hr class="linea-panel-2 mb-4"></center>
                    <livewire:grooming.lista-citas/>    
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card card-grooming mb-2 mt-4 ">
                <div class="card-body card-pet p-3">
                    <h2 class="mb-4 mt-4">Dog Hotel</h2>
                    <center><hr class="linea-panel-2 mb-4"></center>
                     <h5 class="mt-4 mb-4">No tienes ningún dog hotel en tu agenda por ahora</h5> 
                </div>
            </div>
        </div>
    </div> -->

     <center><hr class="linea-panel mt-5 mb-5"></center>

     <div class="row justify-content-center mb-5">
        <div class="col-md-7 col-xs-12">
            <div class="card card-grooming mb-2 mt-4 ">
                <div class="card-body card-pet p-5 ">

                   <div class="col-md-11">
                      <div class="row justify-content-between">
                          <div align="left" class="col-md-6"><h2>Mis Pequeños</h2></div>
                          <div align="right" class="col-md-6">
                            <button  type="button" class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: rgb(119 204 52); font-weight:700;">Agregar</button></div>
                      </div>
                   </div>
                    <center><hr class="linea-panel-2 mb-4"></center>
                        <livewire:grooming.lista-mascota/>    
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card card-grooming mb-2 mt-5 p-3 ">
                <div class="card-body card-pet p-5 ">
                    <h2 class="mb-5 mt-4">Mis Datos</h2>
                    <center><hr class="linea-panel-2 mb-4"></center>
                     <h6 class="mt-1 mb-1">{{ Auth::user()->name }}</h6> 
                    <!--  <h6 class="mt-1 mb-1">0412402678</h6> --> 
                     <h6 class="mt-1 mb-1">{{ Auth::user()->email }}</h6> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
