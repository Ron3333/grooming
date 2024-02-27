 <!--  Modal Start -->
 <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Datos de mi perro</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form wire:submit="createPet" >
              <div class="mb-3">
                <label  for="nombre" class="col-form-label">Nombre</label>
                <input  wire:model="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{ old('nombre') }}" required>
                 @error('nombre')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                 @enderror
              </div>
              <div class="mb-3">
                <label for="apellido" class="col-form-label">Apellido:</label>
                <input  wire:model="apellido" type="text" class="form-control @error('nombre') is-invalid @enderror" id="apellido" value="{ old('apellido') }}" required>
                 @error('apellido')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                 @enderror
              </div>
              <div class="mb-3">
                  <label for="raza" class="col-form-label">Raza:</label>
                  <select wire:model="raza" class="form-select @error('nombre') is-invalid @enderror" aria-label="Seleciona Raza"  required>
                            <option selected >Seleciona una Raza</option>
                            <option value="Basenji">Basenji</option>
                            <option value="Basset Hound">Basset Hound</option>
                            <option value="Beagle">Beagle</option>
                            <option value="Bichón Maltes">Bichón Maltes</option>
                            <option value="Boston Terrier">Boston Terrier</option>
                            <option value="Bulldog Francés">Bulldog Francés</option>
                            <option value="Bulldog Inglés">Bulldog Inglés</option>
                            <option value="Cairn Terrier">Cairn Terrier</option>
                            <option value="Cavaller King Charies Spaniel">Cavaller King Charies Spaniel</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Cocker Spaniel Americano">Cocker Spaniel Americano</option>
                            <option value="Cocker Spaniel Inglés">Cocker Spaniel Inglés</option>
                            <option value="Crestado Chino">Crestado Chino</option>
                            <option value="Gaigo Italiano">Gaigo Italiano</option>
                            <option value="Jack Russell Terrier">Jack Russell Terrier</option>
                            <option value="Lhasa Apso">Lhasa Apso</option>
                            <option value="Maltes">Maltes</option>
                            <option value="Mini Doodle">Mini Doodle</option>
                            <option value="Papillon">Papillon</option>
                            <option value="Pelo Corto">Pelo Corto</option>
                            <option value="Pequinés">Pequinés</option>
                            <option value="Pinscher Miniatura">Pinscher Miniatura</option>
                            <option value="Pomerania">Pomerania</option>
                            <option value="Poodle">Poodle</option>
                            <option value="Pug">Pug</option>
                            <option value="Ratón de Praga">Ratón de Praga</option>
                            <option value="Salchicha (Dachshund)">Salchicha (Dachshund)</option>
                            <option value="Schnauzer Mediano">Schnauzer Mediano</option>
                            <option value="Schnauzer Miniatura">Schnauzer Miniatura</option>
                            <option value="Scottish Terrier">Scottish Terrier</option>
                            <option value="Shiba inu">Shiba inu</option>
                            <option value="Snih Tzu">Snih Tzu</option>
                            <option value="West Highiand White Terrier">West Highiand White Terrier</option>
                            <option value="Whipper">Whipper</option>
                            <option value="Yorkshire Terrier">Yorkshire Terrier</option>
                            <option value="Otro">Otro</option>
                  </select>
                  @error('raza')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                  <div class="position-relative">
                     <div class="position-absolute top-10 start-0">
                     <label for="edad" class="form-label position-relative top-0 start-0 ">Edad: </label> 
                      </div>
                      <div class="position-absolute top-10 end-0">
                    <span x-text="$wire.edad"></span><span> Años</span>
                      </div>
                  </div>
                  <div class="pt-4">
                     <input wire:model="edad" type="range" class="form-range range-cust" value="0" step="1" min="0" max="18" id="edad">
                 </div>
                  @error('edad')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                <div class="position-relative">
                  <div class="position-absolute top-10 end-0">
                    <span x-text="$wire.meses"></span> <span>Meses</span>
                  </div>
               </div>
               <div class="pt-4">
                  <input wire:model="meses" type="range" class="form-range range-cust" value="0" step="1" min="1" max="12" id="meses">
              </div>
              </div>
              <div class="mb-3">
                  <label for="genero" class="form-label">Genero:</label><br>
                  <div class="form-check form-check-inline">
                    <input  wire:model="sexo" class="form-check-input" value="hembra" type="radio" name="sexo" id="inlineRadio1" >
                    <label class="form-check-label" for="inlineRadio1">Hembra</label>
                  </div>
                  <div class="form-check form-check-inline ms-3">
                    <input wire:model="sexo" class="form-check-input"  value="macho" type="radio" name="sexo" id="inlineRadio2" >
                    <label class="form-check-label" for="inlineRadio2">Macho</label>
                 </div>
                 @error('sexo')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                 @enderror
              </div>
              <div class="mb-3">
                  <label for="size" class="form-label">Tamaño:</label><br>
                  <div class="cc-selector">
                      <input wire:model="size" id="pet-small" type="radio" name="size"  value="pequeño" />
                          <label class="drinkcard-cc-small pet-small p-2 " for="pet-small">
                            <div class="position-relative">
                             <div class="position-absolute bottom-pet start-pet translate-middle-x">
                                 Pequeño
                               </div>
                             </div>
                          </label>
                      <input wire:model="size" id="pet-medium" type="radio" name="size"  value="mediano" />
                        <label class="drinkcard-cc-medium pet-medium p-2 "for="pet-medium">
                           <div class="position-relative">
                            <div class="position-absolute bottom-pet start-pet translate-middle-x">
                                 Mediano
                               </div>
                             </div>
                        </label>
                  </div>
                  @error('size')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                <div class="position-relative">
                    <div class="position-absolute top-10 start-0">
                         <label for="peso" class="form-label position-relative top-0 start-0 ">Peso: </label> 
                    </div>
                    <div class="position-absolute top-10 end-0">
                       <span x-text="$wire.peso"></span><span> Lb</span>
                    </div>
                  </div>
                  <div class="pt-4">
                      <input wire:model="peso" type="range" class="form-range range-cust" value="0" step="1" min="1" max="50" id="peso">
                  </div>
                   @error('peso')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="energia" class="col-form-label">Energía:</label>
                  <select wire:model="actitud" class="form-select" aria-label="Energia" id="energia">
                            <option selected >¿Cómo considera a tu mascota?</option>
                            <option value="Energía alta">Energía alta</option>
                            <option value="Energía media">Energía media</option>
                            <option value="Energía baja">Energía baja</option>
                            <option value="Nerviosa">Nerviosa</option>
                            <option value="Nerviosa e insegura">Nerviosa e insegura</option>
                            <option value="Ansiosa">Ansiosa</option>
                            <option value="Agresiva">Agresiva</option>
                  </select>
                  @error('actitud')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                  <label for="energia" class="col-form-label">Tu perro socializa con:</label>
                   @if($block_social)
                  <div class="form-check">
                    <input wire:model="socializa.0"  class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" disabled>
                    <label class="form-check-label" for="flexCheckDefault1">
                      Personas
                    </label>
                  </div>
                  <div class="form-check">
                    <input wire:model="socializa.1"   class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" disabled>
                    <label class="form-check-label" for="flexCheckChecked2">
                      Perros
                    </label>
                  </div>
                  <div class="form-check">
                    <input wire:model="socializa.2"     class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" disabled>
                    <label class="form-check-label" for="flexCheckDefault3">
                      Niños
                    </label>
                  </div>
                   </template>
                   @else
                    <div class="form-check">
                    <input wire:model="socializa.0" class="form-check-input" type="checkbox" value="personas" id="flexCheckDefault1" >
                    <label class="form-check-label" for="flexCheckDefault1">
                      Personas
                    </label>
                  </div>
                  <div class="form-check">
                    <input wire:model="socializa.1"   class="form-check-input" type="checkbox" value="perros" id="flexCheckChecked2" >
                    <label class="form-check-label" for="flexCheckChecked2">
                      Perros
                    </label>
                  </div>
                  <div class="form-check">
                    <input wire:model="socializa.2"  class="form-check-input" type="checkbox" value="niños" id="flexCheckDefault3" >
                    <label class="form-check-label" for="flexCheckDefault3">
                      Niños
                    </label>
                  </div>
                 @endif
                  <div class="form-check">
                    <input  wire:model="socializa.3" wire:click="blocksocializa()"  class="form-check-input" type="checkbox" value="No socializa" id="flexCheckChecked4" >
                    <label class="form-check-label" for="flexCheckChecked4">
                      No socializa
                    </label>
                  </div>
                   @error('socializa')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="muerde" class="col-form-label">Muerde:</label>
                  <select wire:model="muerde" class="form-select" aria-label="Energia" id="muerde">
                        <option selected >¿Alguna vez ha mordido a alguien?</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>   
                        <option value="Lo intenta pero no muerde">Lo intenta pero nunca lo ha hecho</option>  
                  </select>
                  @error('muerde')
                      <span class="invalid-feedback-2" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones importantes</label>
                 <textarea wire:model="info_adicional" class="form-control" id="observaciones" rows="1"  placeholder="Problemas de piel, de estomago verrugas, heridas, etc..."></textarea>
              </div>
              <div class="mb-3 ">
                  <label for="foto" class="form-label">Foto para el perfil de tu perro</label>
                  @if(!$foto) 
                  <div class="position-relative">
                    <div class="position-absolute bottom-0-g start-50-g translate-middle-x">
                      <input  wire:model="foto"  class="custom-file-input" type="file" id="foto">
                    </div>
                  </div>
                   <br><br><br>
                    @endif
                    <div wire:loading  wire:target="foto"  >
                        <div class="foto-load"> <img src="/img/pet.png" class="img-posiciom"  ></div>
                    </div>
                   @if($foto) 
                      <div class="position-relative img-pet">
                         <div class="position-absolute start-50-img-pet translate-middle-x">
                             <input style="background-image: url('{{ $foto->temporaryUrl() }}');background-size: cover; background-position: center; width: 98px; height: 115px !important;     border: 1px solid rgba(119, 204, 52, 1);  border-radius: 5px;" wire:model="foto"  class="custom-file-input-2" type="file" id="foto">
                          </div>
                      </div>
                   @endif
              </div>
              <div class="mb-3">
                 @if($errors->any())
                      <div style="color:red !important" class="text-center text-sm text-red-600 space-y-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div>
                 @endif
              </div>
              <div class="modal-footer">
                  <div class="d-grid gap-3 col-11 mx-auto">
                     <button type="submit"   class="btn btn-success btn-success-registro  ">Registrar</button>
                  </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>   
  </div> 


    
