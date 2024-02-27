
<div  class="container-fluid ">
    <div class="row justify-content-center titulo  px-4" style="background-color: white;">
           <div class="col-xs-2 col-md-1 gx-1 img-pet-small">
              <div><img src="/img/cita1.jpeg" class="img-fluid pb-1"></div>
              <div><img src="/img/cita2.jpeg" class="img-fluid pb-1"></div>
              <div><img src="/img/cita3.jpeg" class="img-fluid pb-1"></div>
              <div><img src="/img/cita4.jpeg" class="img-fluid pb-1"></div>
              <div><img src="/img/cita5.jpeg" class="img-fluid pb-1"></div>
          </div>
          <div class="col-xs-10 col-md-5 gx-2">
              <div><img src="/img/citag1.jpeg" class="img-fluid "></div>
          </div>
            <div class="col-xs-12 col-md-6 grooming-px grooming-py">
              <div class=" ms-3">
                    <h4>Servicio de Grooming</h4>
                    <h1>Full Grooming Plus</h1>
                    <span>Deposito Inicial</span>
                    <h3 style="color: rgba(119, 204, 52, 1); font-weight:700;"> $50.00</h3>
                    <span class="mt-1" style="color:red; font-size: 11px;">Si cancela la cita faltando menos de 24 hrs para el servicio perderá su depósito</span><br><br>
                   
                    <div class="container">
                        @if($modificar_cita)
                        <form wire:submit.prevent="modificarCita({{$id_pregrooming}})">
                        @else
                        <form wire:submit.prevent="crearCita">
                        @endif
                       <div class="row">
                         <div class="col-8">
                            <h5>Seleccione el perro para el grooming</h5>
                                @foreach($pets as  $pet)
                                <div class="form-check" wire:key="{{ $pet->id }}">  
                                    <input wire:model="petId" class="form-check-input" value="{{$pet->id}}" type="radio" name="flexRadioDefault" id="pet-{{$pet->id}}">
                                    <label class="form-check-label" for="pet-{{$pet->id}}">
                                       {{ $pet->nombre }}
                                    </label>
                                </div>
                                @endforeach
                                @error('petId')
                                  <span class="invalid-feedback-2" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                         </div>
                         <div class="col-4">
                              <img src="/img/cita1.jpeg" class="rounded-circle float-end" width="90px" alt="...">
                         </div>
                       </div>
                       <div class="row mt-3">
                          <div class="col-12" align="right" gx-1>
                              <button  type="button" class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#exampleModal"  ><h6 style="font-size: 14px; padding: 0px; margin-right: 0px;" >Registrar otro(a) perrito(a)</h6></button> 
                          </div>       
                       </div>
                       <div class="row">
                          <div class="col-12">
                              <label for="observaciones" class="form-label">Observaciones importantes para el groomer</label>
                              <textarea wire:model="observaciones" class="form-control" id="observaciones" rows="1" placeholder="Problemas de piel, de estomago verrugas, heridas, etc..."></textarea>
                               @error('observaciones')
                                  <span class="invalid-feedback-2" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                          </div>         
                       </div>
                       <div class="row">
                        <label for="tipo_grooming" class="form-label pt-3">Tipo de Grooming</label>
                          <div  class="col-12" >
                              <div class="container">
                                <div class="row justify-content-start gx-1 gy-1 ">
                                    <div class="col-3">
                                      <input  wire:model="tipo_de_grooming" value="Full Grooming" type="radio" class="btn-check "  id="fullGrooming" autocomplete="off">
                                      <label  class="btn btn-pet-cita-1 btn-outline-success-pet" for="fullGrooming">Full Grooming</label>
                                    </div>
                                    <div class="col-3">
                                      <input wire:model="tipo_de_grooming" value="Full Grooming Plus" type="radio" class="btn-check "  id="full_grooming_plus" autocomplete="off">
                                      <label class="btn btn-pet-cita-1 btn-outline-success-pet" for="full_grooming_plus">Full Grooming Plus</label>
                                    </div>
                                    <div class="col-3">
                                      <input wire:model="tipo_de_grooming" value="Baño Sanitario" type="radio" class="btn-check "  id="sanitario" autocomplete="off">
                                      <label class="btn btn-pet-cita-1 btn-outline-success-pet" for="sanitario">Baño Sanitario</label>
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-3">
                                      <input wire:model="tipo_de_grooming"  value="Solo Baño" type="radio" class="btn-check "  id="solo" autocomplete="off">
                                      <label class="btn btn-pet-cita-1 btn-outline-success-pet" for="solo">Sólo Baño</label>
                                    </div>
                                    <div class="col-3">
                                      <input wire:model="tipo_de_grooming" value="Corte de Uñas" type="radio" class="btn-check "  id="corte" autocomplete="off">
                                      <label class="btn btn-pet-cita-1 btn-outline-success-pet" for="corte">Corte de Uñas</label>
                                    </div> 
                                    <div class="col-12">
                                        <div x-show="$wire.tipo_de_grooming == 'Full Grooming' ">
                                           <span style="font-size:0.8rem;">Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado y Corte de la raza o Personalizado</span>
                                        </div>
                                        <div x-show="$wire.tipo_de_grooming == 'Full Grooming Plus' ">
                                           <span style="font-size:0.8rem;">Full Grooming Plus: Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado y Corte de pelo mas elaborado. Ejemplo: Corte Asian Fusion.</span>
                                        </div>
                                         <div x-show="$wire.tipo_de_grooming == 'Baño Sanitario' ">
                                           <span style="font-size:0.8rem;">Baño sanitario: Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño, Secado, Despeje de huellas, Redondeo de Patas, Despeje de Ojos, Despeje de Zonas Nobles (Zonas Íntimas).</span>
                                        </div>
                                         <div x-show="$wire.tipo_de_grooming == 'Solo Baño' ">
                                           <span style="font-size:0.8rem;">Solo Baño : Corte de Uñas, Limado de Uñas, Limpieza de Oídos, Baño y Secado.</span>
                                        </div>
                                        <div x-show="$wire.tipo_de_grooming == 'Corte de Uñas' ">
                                           <span style="font-size:0.8rem;">Corte de uñas: Corte de Uñas y Limado de Uñas.</span>
                                        </div>
                                    </div>
                                     <div class="col-12">
                                        @error('tipo_de_grooming')
                                         <span class="invalid-feedback-2" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                     </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="row">
                          <div  class="col-12" >
                            <label for="nudo" class="form-label pt-3">Tiene Nudos</label>
                              <div>
                              <input wire:model="nudos" value="si" type="radio" class="btn-check "  id="si_nudo" autocomplete="off">
                              <label class="btn btn-pet-cita-2 btn-outline-success-pet" for="si_nudo" >Sí</label>
                              <input wire:model="nudos" value="no" type="radio" class="btn-check " id="no_nudo" autocomplete="off">
                              <label class="btn btn-pet-cita-2 btn-outline-success-pet" for="no_nudo">No</label>
                             </div>
                                @error('nudos')
                                <span class="invalid-feedback-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>                               
                                @enderror
                          </div>
                       </div>

                       <!-- Calendario Cita Start-->

                       <div class="row"> 
                            <span class="mt-3 mb-3">Fecha </span>
                            <div class="col-4" >
                                <span class="float-start">
                                  <button wire:click="previous()" type="button" class="btn btn-link">
                                    <i  class="bi bi-caret-left-fill btn-calend"></i>
                                    <button type="button" class="btn btn-link">
                                </span>
                            </div>
                            <div class="col-4">
                                <center><span class="mes">{{ $mes }}/{{ date('Y')}}</span></center>
                            </div>
                            <div class="col-4" >
                                <span class="float-end">
                                  <button wire:click="next()"  type="button" class="btn btn-link">
                                    <i class="bi bi bi-caret-right-fill btn-calend"></i>
                                  </span>
                                </button>
                            </div>

                            <div class="col-12 mt-2">
                                <div class="table-responsive-md text-center "> 
                                  <table class="table align-middle table-pet  ">
                                        <tr>
                                          <td>Lun</td>
                                          <td>Mar</td>
                                          <td>Mie</td>
                                          <td>Jue</td>
                                          <td>Vie</td>
                                          <td>Sab</td>
                                          <td>Dom</td>
                                        </tr>
                                        <tr>
                                           @foreach($dias as $dia)
                                             @if( $dia['fecha']->format('N') < 6)
                                                 @if( $dia['fecha']->format('Y-m-d') < date('Y-m-d') )
                                                   <td><button type="button" class="btn btn-table btn-danger">{{ $dia['fecha']->format('d') }}</button></td>
                                                @else
                                                     @if( $dia['status_hora'] == 0 )
                                                     <td><button  wire:click="dia('{{$dia['fecha']}}', '{{$dia['fecha']->format('N')}}' )" type="button" 
                                                        class="btn btn-table btn-light
                                                     {{  ${'class_dia_'.$dia['fecha']->format('N')}   == true ? 'activo_dia' : 'desactivo_dia' }} ">
                                                     {{ $dia['fecha']->format('d') }}</button>
                                                    </td>
                                                     @elseif( $dia['status_hora'] >= 1 AND $dia['status_hora'] <= 2 )
                                                     <td><button wire:click="dia('{{$dia['fecha']}}')" type="button" class="btn btn-table btn-success activo_dia ">{{ $dia['fecha']->format('d') }}</button></td>
                                                     @elseif($dia['status_hora'] == 3)
                                                    <td><button type="button" class="btn btn-table btn-danger">{{ $dia['fecha']->format('d') }}</button></td>
                                                    @endif
                                                @endif
                                             @elseif( $dia['fecha']->format('N') == 6 OR $dia['fecha']->format('N') == 7)
                                               <td><button type="button" class="btn btn-table btn-danger">{{ $dia['fecha']->format('d') }}</button></td>
                                             @endif
                                          @endforeach
                                        </tr>
                                  </table>
                          
                                 @if(  $hora_cita  )
                                   <h6><b>{{ date("d-M-Y", strtotime($fecha_cita2)) }}</b></h6>
                                   <table>
                                      <tr>
                                       <td align="left">Mañana</td>
                                       <td></td>
                                     </tr>
                                     <tr>
                                      @if($hora_select_1)
                                        <td><button wire:click.prevent=""  class="hora_desactivada "  >&nbsp;&nbsp;&nbsp; 10:00 am &nbsp;&nbsp;&nbsp;</button></td>
                                      @else
                                       <td><button  wire:click.prevent="fechaCita('{{$fecha_cita2}}' , '10:00 am' )" class="{{ $activo_10 == true ? 'hora-activo' : 'hora' }} "  >&nbsp;&nbsp;&nbsp; 10:00 am &nbsp;&nbsp;&nbsp;</button></td>
                                      @endif
                                      <td></td>     
                                   </tr>
                                    <tr style="height: 1.2rem;">
                                       <td></td>
                                       <td></td>
                                   </tr>
                                   <tr>
                                     <td align="left" >Tarde</td>
                                     <td></td>
                                   </tr>
                                   <tr>
                                      @if($hora_select_2)
                                         <td><button wire:click.prevent=""  class="hora_desactivada" >&nbsp;&nbsp;&nbsp; 2:00 pm &nbsp;&nbsp;&nbsp;</button></td>
                                       @else
                                         <td><button wire:click.prevent="fechaCita('{{$fecha_cita2}}', '2:00 pm' )"  class="{{ $activo_2 == true ? 'hora-activo' : 'hora' }}" >&nbsp;&nbsp;&nbsp;&nbsp; 2:00 pm &nbsp;&nbsp;&nbsp;&nbsp;</button></td>
                                       @endif      
                                      @if($hora_select_3)
                                       <td><button wire:click.prevent="" class="hora_desactivada" >&nbsp;&nbsp;&nbsp; 4:00 pm &nbsp;&nbsp;&nbsp;</button></td>
                                       @else
                                        <td><button wire:click.prevent="fechaCita( '{{$fecha_cita2}}', '4:00 pm' )" class="{{ $activo_4 == true ? 'hora-activo' : 'hora' }}" >&nbsp;&nbsp;&nbsp;&nbsp; 4:00 pm &nbsp;&nbsp;&nbsp;&nbsp;</button></td>
                                       @endif
                                         
                                   </tr>
                                 </table>
                                  <input wire:model="fecha_cita" type="hidden" id="fechatCita-X" >
                                 @endif 
                                 <div class="row">
                                    <div class="col-12 mt-3">
                                      @if(!empty($cita))
                                           <h6 style="color: red; font-weight: 400;"><u>Día de la Cita : {{ $cita }}</u></h6>
                                      @endif
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-12 mt2">
                                         <h style="color: red; font-weight: 700;">{{ $mensaje }}</h6>      
                                    </div>
                                 </div>
                                 <div class="row" >
                                   <div class="col-12">
                                       <ul style="color: red;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                   </div>
                                 </div>
                              </div>
                          </div>     
                      </div>

                      <!-- Calendario Cita End-->

                      <div class="row">
                          <div class="col-12 mt-3">
                            <span class="leyenda-1"></span> Disponible 
                            <span class="leyenda-2"></span> Seleccionado 
                            <span class="leyenda-3"></span> No disponible
                            
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-4">
                            <div class="d-grid gap-1 col-12 mx-auto">
                                @if($modificar_cita)
                                  <button type="submit"   class="btn btn-success btn-success-registro  ">Modificar Cita</button>
                                @else
                                  <button type="submit"   class="btn btn-success btn-success-registro  ">Programar Cita</button>
                                @endif
                            </div>
                        </div>
                      </div>
                       <button class="mt-4" type="button" wire:click="facturas()">
                        {{ __('Modal Factura') }}
                        </button>
                       
                    </div>
                  </form>
              </div>
          </div>
    </div>
   
   <!-- Modal de factura start -->
   <div wire:ignore.self class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-header-factura ">
             <h5 class="modal-title" id="exampleModal2Label">
               <center><b> Por favor confirma la información</b></center>
            </h5>
             <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
           <div class="container-fluid">
            <form wire:submit="confirmaPay">
             @if($factura)
                <div class="row">
                  <div class="col-12 text-center">
                    <h4 class="modal-title" id="exampleModal2Label"> Cita: {{$fecha_grooming}}</h4>
                    <p><img width="50px" src="/foto/{{$foto_groming}}"></p>
                    <h6>{{$nombre_perro_grooming}}</h6>
                    <h5><b>{{$tipo_groming_grooming}}</b></h5>
                    <h6>Total Depósito a pagar</h6>
                    <h5 style="color: green"><b>${{ number_format($precio_grooming, 2, ',', ' ')}}</b></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12   text-center">
                      <button  wire:click.prevent="modificarCitaPregrooming({{$id_pregrooming}})" type="button" class="btn btn-success btn-success-registro btn-sm" data-bs-dismiss="modal" >Modificar</button>
                  </div>   
                </div>
             @else
             <table>
                 @foreach($Pregroomings as  $Pregrooming)
                    <tr  wire:key="{{ $Pregrooming->id }}">
                        <td align="center"><img width="50px" src="/foto/{{$Pregrooming->foto}}"><br>
                            <span></span>{{$Pregrooming->perro}}
                        </td>
                        <td align="center"><b>Cita:{{$Pregrooming->fecha}}</b> <br> <span>{{$Pregrooming->tipo_groming}}</span></td>
                        <td class="p-4">
                             <button wire:click="modificarCitaPregrooming({{$Pregrooming->id}})" type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal" >Modificar</button>
                        </td>
                        <td>
                            <button wire:click.prevent=" eliminar({{$Pregrooming->id}})" type="button" class="btn btn-link"   ><i style="color: red; font-size: 1.4rem" class="bi bi-trash-fill" ></i></button>
                        </td>
                    </tr>
                @endforeach
            </table>
            <h6 class="mt-1 text-center">Total depósito a Pagar</h6>
            <h5 class="mt-1 text-center" style="color: green"><b>${{ number_format($precio_total_grooming, 2, ',', ' ')}}</b></h5>
            @endif
            @if($cant_perros > 1 )
                <div align="center" class="mt-1">
                    <h5>¿ Quiere agregar otra cita para otro perrito ?</h5>
                    <table>
                        <tr>
                          <td>
                            <button wire:click.prevent="cerrar()" type="button" data-bs-dismiss="modal" class="btn btn-success  btn-success-registro btn-sm ">Si</button>
                          </td>
                        <td>
                           <button wire:click.prevent="cerrar()" type="button" data-bs-dismiss="modal" class="btn btn-success btn-success-registro  btn-sm">No</button>
                        </td>     
                    </tr>
                    </table>
                 </div>
            @endif
             <div class="mt-1"><span style="color:red; font-size:0.8rem">Si cancela la cita faltando menos de 24 hrs para el servicio pederá su depósito</span></div>
              <div class="mt-1"><span style=" font-size:1rem">Selecciona el método de pago de tu preferencia</span></div>
            <div align="center">
                <table>
                  <tr>
                    <td><span style="color: red;"><a href="#"><img  class="img-fluid"  src="/img/cashapp.png"></a></span> </td>
                    <td><span style="color: blue;"><a href="#"><img  class="img-fluid"  src="/img/venmo.png"> </span> </td>
                    <td><span style="color: green;"><a href="#"><img  class="img-fluid"  src="/img/zelle.jpeg"> </span></td>
                  </tr>
                </table>
            </div>
            <!-- foto de pago Start-->
            <div class="container-fluid">
                <div class=" row mt-3 ">
                    <div class="col-12 mt-2">
                          @if(!$foto_pago) 
                          <div class="position-relative mb-5">
                            <div class="position-absolute bottom-0-foto-p start-50-g-p translate-middle-x-p"> 
                              <input  wire:model="foto_pago"  class="custom-foto-pago" type="file" id="foto_pago">
                            </div>
                          </div> 
                           <br><br><br>
                            @endif
                            <div wire:loading  wire:target="foto_pago"  >
                                <div class="foto-load"> <img src="/img/pet.png" class="img-posiciom"  ></div>
                            </div>
                           @if($foto_pago) 
                              <div class="position-relative img-pet">
                                 <div class="position-absolute start-50-img-pago translate-middle-x">
                                     <input  style="background-image: url('{{ $foto_pago->temporaryUrl() }}');background-size: cover; background-position: center;    border: 1px solid rgba(119, 204, 52, 1);  border-radius: 5px; width:130%" wire:model="foto_pago"  class="custom-foto-pago-2" type="file" id="foto">
                                  </div>
                              </div>
                           @endif
                    </div>
                </div>
                   <!-- foto de pago End-->
            </div>
              <div class="modal-footer">
                @if(!$foto_pago) 
                <div class="d-grid gap-1 col-12 mx-auto">  
                     <button type="submit" class="btn btn-success btn-success-registro" disabled>Programar Cita</button>
                </div>
                @else
                 <div class="d-grid gap-1 col-12 mx-auto">  
                     <button type="submit" class="btn btn-success btn-success-registro">Programar Cita</button>
                </div>
                @endif
              </div>
           </form>
        </div>
    </div>   
  </div> 
 <!-- Modal de factura end -->
    
</div>

  @script
     <script>

        let modalsElement = document.getElementById('exampleModal2');
            modalsElement.addEventListener('hidden.bs.modal', () => {
            console.log("RESET");
            /*Livewire.dispatch('resetModal');*/

        });

         window.Livewire.on('close-modal-factura', (e) => {
             console.log("CLOSE-MODAL");
             var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'), {
                       keyboard: false
           }); 
            myModal.hide();
        });

        /*$wire.on('close-modal-factura', (e) => {

           console.log("CLOSE-MODAL");
           var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'), {
                       keyboard: false
           });
          myModal.hide();

         
        });*/

        $wire.on('show-modal-factura', (e) => {
          console.log("SHOW-MODAL");
          var myModal = new bootstrap.Modal(document.getElementById('exampleModal2'), {
          keyboard: false
          });
          myModal.show(); 
        });
     </script>
   @endscript


