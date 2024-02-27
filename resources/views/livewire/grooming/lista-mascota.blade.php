
<div>
     <div class="card-body  mb-2">
        <div class="container-fluid">
            <div class="row justify-content-center row-cols-auto">
                 @foreach($pets as $pet)  
                    <div class=" col-xs-2 ">
                    <!-- <div class=" col-xs-6 col-sm-4 col-md-2 text-center "> -->
                            <span><img src="/foto/{{$pet->foto}}" width="60px" ></span><br><span> {{ $pet->nombre }} </span>
                    </div>
                @endforeach
             </div>
        </div>     
    </div>
    <div class="mt-4 mb-4">
            <center><button type="button" class="btn btn-success-pet"><b>Perfil del Hotel</b></button></center>
    </div>
    <div>
        <center><button wire:click="programarCita" type="button" class="btn btn-success-pet"><h4><b>Programar Cita</b></h4></button></center>
    </div>
    @if($programar_cita)
    <div  wire:transition.opacity.duration.200ms class="container-fluid">
        <div class="row mt-5">
            <div class="col-4">
                <center><button wire:click="cita" type="button" class="btn btn-success-pet"><b>Grooming</b></button></center>
            </div>
            <div class="col-4">
                <center><button type="button" class="btn btn-success-pet"><b>Dog Hotel</b></button></center>
            </div>
            <div class="col-4">
                <center><button type="button" class="btn btn-success-pet"><b>Cuidado Diario</b></button></center>
            </div> 
        </div>   
    </div>
    @endif
</div>
