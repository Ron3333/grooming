
<div>
    <div class="card-body mb-2">
        <div class="container">
           
            @foreach($citas as $cita) 
            <div class="row  justify-content-between align-items-center card-pet-2 ">
                <div class=" col-xs-12 col-sm-4 col-md-1 text-center ">
                    <span><img src="/foto/{{$cita->pet->foto}}" width="60px" ></span>
                </div>
                <div class=" col-xs-12 col-sm-4 col-md-2 text-center ">
                    <span class="cita-nombre">{{$cita->pet->nombre}}</span>
                </div>
                <div class=" col-xs-12 col-sm-4 col-md-2 text-center ">
                    <span class="cita-tipo-grooming">{{$cita->tipo_de_grooming}}</span>
                </div>
                <div class=" col-xs-12 col-sm-4 col-md-3 text-center ">
                    <span class="cita-fecha">{{$cita->fecha}}</span>
                </div>
                <div class=" col-xs-12 col-sm-4 col-md-2 text-center ">
                    <button type="button" class="btn btn-danger btn-sm cita-cancelar">Cancelar Grooming</button>
                </div>
                <div class=" col-xs-12 col-sm-4  col-md-2 text-center ">
                    <span class="cita-estatus"><i class=" icon-cita-status bi bi-circle-fill"></i> Pendiente  </span>
                </div>
            </div>
            @endforeach                       
          
       </div>
    </div>
</div>
