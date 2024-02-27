<?php

namespace App\Livewire\Grooming;

use Livewire\Attributes\On;

use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\Pregrooming;
use Carbon\CarbonImmutable;
use App\Models\Grooming;
use Livewire\Component;
use App\Models\Pet;
use Carbon\Carbon;


class Citas extends Component
{
    use WithFileUploads;

    public  $modalPet = true;
    public  $pets;
    public  $petId;
    public  $cant_perros=0 ;
    public  $observaciones;
    public  $tipo_de_grooming = '';
    public  $nudos = '';
    public  $fecha ;
    public  $dias ;
    public  $fecha_cita ;
    public  $fecha_cita2 ;
    public  $fecha_texto ;
    public  $hora_cita = false;
    public  $cita ;
    public  $hora_select_1= true;
    public  $hora_select_2= true;
    public  $hora_select_3= true;
    public  $activo_10 = false;
    public  $activo_2  = false;
    public  $activo_4  = false;
    public  $mes;
    public  $mensaje;

    /* confirmar pago*/

    public  $id_pregrooming;
    public  $foto_pago;
    public  $factura = true;
    public  $Pregroomings;
    public  $id_perro;
    public  $nombre_perro_grooming;
    public  $fecha_grooming;
    public  $precio_grooming;
    public  $tipo_groming_grooming;
    public  $foto_groming;
    public  $precio_total_grooming = 0;
    public  $modificar_cita = false;

    public  $class_dia_1 = false;
    public  $class_dia_2 = false;
    public  $class_dia_3 = false;
    public  $class_dia_4 = false;
    public  $class_dia_5 = false;
   

    public function render()
    {
        return view('livewire.grooming.citas')->layout('layouts.app'); 
    }

    public function  mount(){

         //$this->eliminarCitasPregrooming();
        $this->foto_groming='test.jpg';

        $dias = collect(range(1, 7));

        foreach ( $dias as $key => $value) {
             $hoy = CarbonImmutable::now();
             $this->fecha = $hoy->startOfWeek();
             $this->mes = date("M", strtotime($hoy));
             $fecha_texto = date("d/m/y", strtotime($this->fecha->add($value-1, 'day')));
             //print($fecha_texto.'<br>');
             $cant = Grooming::where('fecha_texto', trim($fecha_texto) )->count();
             //print('cant: '.$cant.'<br>');
             $this->dias[$key]=['dia'=> $value, 'fecha'=>$this->fecha->add($value-1, 'day'), 'status_hora'=> $cant ];
        }

         if (Auth::check()) {
            $id = Auth::id();
        }

        $this->pets = Pet::where('user_id', $id )
                         ->orderBy('id','ASC')
                         ->get(); 

        $this->cant_perros=$this->pets->count();

        if( $this->cant_perros == 0){
            return redirect()->to('/mascota');
        }   
   }

   public function crearCita(){

        $this->validate([
                'petId' =>'required',
                'observaciones' => 'required',
                'tipo_de_grooming' => 'required',
                'nudos' => 'required',
                'fecha_cita' => 'required',
                  ]);

        $pet =  Pet::where('id', $this->petId )->first();

        if($this->tipo_de_grooming == 'Full Grooming'){
            $precio=50.00;
            $tipo_grooming = 'Full Grooming' ;
        }elseif ($this->tipo_de_grooming == 'Full Grooming Plus') {
            $precio=50.00;
            $tipo_grooming = 'Full Grooming Plus' ;
        }elseif ($this->tipo_de_grooming == 'Baño Sanitario') {
            $precio=40.00;
            $tipo_grooming = 'Baño Sanitario' ;
        }elseif ($this->tipo_de_grooming == 'Solo Baño') {
            $precio=35.00;
            $tipo_grooming = 'Solo Baño' ;
        }elseif ($this->tipo_de_grooming == 'Corte de Uñas') {
            $precio=10.00;
            $tipo_grooming = 'Corte de Uñas' ;
        }

        if (Auth::check()) {
            $user_id = Auth::id();
         }

        // mascota_repetida_el_mismo_dia en Pregrooming
        $mascota_repetida = Pregrooming::where('user_id', $user_id )
                                     ->where('fecha_texto', $this->fecha_texto) 
                                     ->where('pet_id', $this->petId)->count(); 

        if($mascota_repetida > 0 ){
            $this->mensaje="Ya la mascota fue seleccionada para cita de este día";
            return;
        }

          // mascota_repetida_el_mismo_dia en Grooming

         $mascota_repetida_grooming = Grooming::where('user_id', $user_id )
                                     ->where('fecha_texto', $this->fecha_texto) 
                                     ->where('pet_id', $this->petId)->count(); 

        if($mascota_repetida_grooming > 0 ){
            $this->mensaje="Ya la mascota fue seleccionada para cita de este día";
            return;
        }

         // Fecha ya selecionada  por usted en Pregrooming
        $fecha_selecionada_usuario = Pregrooming::where('user_id', $user_id )
                                     ->where('fecha', $this->fecha_cita)->count(); 

        if($fecha_selecionada_usuario > 0 ){
            $this->mensaje="Esta fecha ya fue seleccionada por usted, Seleccione  otras fecha o elimine la cita";
            return;
        }

         // Fecha ya selecionada  por usted en Grooming
        $fecha_selecionada_usuario_grooming = Grooming::where('user_id', $user_id )
                                     ->where('fecha', $this->fecha_cita)->count(); 

        if($fecha_selecionada_usuario_grooming > 0 ){
            $this->mensaje="Esta fecha ya fue seleccionada por usted, Seleccione  otras fecha o elimine la cita";
            return;
        }

        $fecha_selecionada = Pregrooming::where( 'fecha',  $this->fecha_cita)
                                        ->where('user_id', '<>', $user_id)->count(); 
                            
        if($fecha_selecionada > 0 ){
            $this->mensaje="Fecha ya fue seleccionada por otro usuario, pero NO HA SIDO CONFIRMADA, vuelva a intentarlo dentro de 20 minutos ";
            return;
        }


        $pregrooming = new Pregrooming;
        $pregrooming->depósito_inicial = $precio;
        $pregrooming->fecha = $this->fecha_cita;
        $pregrooming->fecha_texto = trim($this->fecha_texto);
        $pregrooming->nudos = $this->nudos;
        $pregrooming->observaciones = $this->observaciones ;
        $pregrooming->perro = $pet->nombre ;
        $pregrooming->tipo_groming = $tipo_grooming;
        $pregrooming->user_id = $user_id;
        $pregrooming->pet_id =  $this->petId;
        $pregrooming->foto = $pet->foto;
        $pregrooming->save();

        $this->Pregroomings = Pregrooming::where('user_id', $user_id )->get(); 

        if($this->Pregroomings->count() == 1){
            $this->factura = true;
            $this->id_pregrooming = $this->Pregroomings[0]->id;
            $this->id_perro = $this->Pregroomings[0]->pet_id;
            $this->nombre_perro_grooming =  $this->Pregroomings[0]->perro;
            $this->fecha_grooming =  $this->Pregroomings[0]->fecha;
            $this->precio_grooming =  $this->Pregroomings[0]->depósito_inicial;
            $this->tipo_groming_grooming =  $this->Pregroomings[0]->tipo_groming;
            $this->foto_groming =  $this->Pregroomings[0]->foto;
        }else {
            $this->factura=false;
            $this->precio_total_grooming = Pregrooming::where('user_id', $user_id )->sum('depósito_inicial'); 
        }

        $this->reset('petId','observaciones','tipo_de_grooming','nudos','cita');

        $this->dispatch('show-modal-factura'); 
              
    }

    public function facturas(){

        if (Auth::check()) {
            $user_id = Auth::id();
         }

        $this->Pregroomings = Pregrooming::where('user_id', $user_id )->get(); 

        if($this->Pregroomings->count() == 1){
            $this->factura = true;
            $this->id_pregrooming = $this->Pregroomings[0]->id;
            $this->id_perro = $this->Pregroomings[0]->pet_id;
            $this->nombre_perro_grooming =  $this->Pregroomings[0]->perro;
            $this->fecha_grooming =  $this->Pregroomings[0]->fecha;
            $this->precio_grooming =  $this->Pregroomings[0]->depósito_inicial;
            $this->tipo_groming_grooming =  $this->Pregroomings[0]->tipo_groming;
            $this->foto_groming =  $this->Pregroomings[0]->foto;
        }else {
            $this->factura=false;
            $this->precio_total_grooming = Pregrooming::where('user_id', $user_id )->sum('depósito_inicial'); 
        }

        $this->dispatch('show-modal-factura');
    
    }

    public function modificarCitaPregrooming($id){

         
         $this->reset('petId','observaciones','tipo_de_grooming','nudos','fecha_cita');
         $this->mensaje="";
         $this->modificar_cita = true;
         $this->hora_cita = false;

         $pregroomings = Pregrooming::where('id', $id )->get();

         $this->id_pregrooming = $pregroomings[0]->id;
         $this->petId = $pregroomings[0]->pet_id; // Linea de codigo importante para actualizar
         $this->observaciones = $pregroomings[0]->observaciones;
         $this->tipo_de_grooming = $pregroomings[0]->tipo_groming;
         $this->nudos = $pregroomings[0]->nudos;   
         $this->cita =$pregroomings[0]->fecha;
         $this->fecha_cita =$pregroomings[0]->fecha;

         if (Auth::check()) {
            $user_id = Auth::id();
         }

        $this->pets = Pet::where('user_id', $user_id )
                         ->orderBy('id','ASC')
                         ->get();

        $this->dispatch('close-modal-factura');
       
    }

    public function eliminar($id){

        $pregrooming = Pregrooming::find($id);

        $pregrooming->delete();

        if(Auth::check()) {
            $user_id = Auth::id();
         }

        $this->Pregroomings = Pregrooming::where('user_id', $user_id )->get(); 

        if($this->Pregroomings->count() == 1){
            $this->factura = true;
            $this->nombre_perro_grooming =  $this->Pregroomings[0]->perro;
            $this->fecha_grooming =  $this->Pregroomings[0]->fecha;
            $this->precio_grooming =  $this->Pregroomings[0]->depósito_inicial;
            $this->tipo_groming_grooming =  $this->Pregroomings[0]->tipo_groming;
            $this->foto_groming =  $this->Pregroomings[0]->foto;
        }else {
            $this->factura=false;
            $this->precio_total_grooming = Pregrooming::where('user_id', $user_id )->sum('depósito_inicial'); 
        }

        $this->dispatch('show-modal-factura'); 
    }

    public function modificarCita($id_pregrooming){

        $this->validate([
                'petId' =>'required',
                'observaciones' => 'required',
                'tipo_de_grooming' => 'required',
                'nudos' => 'required',
                'fecha_cita' => 'required',
                  ]);

        $pet =  Pet::where('id', $this->petId )->first();
        $pregrooming =  Pregrooming::find($id_pregrooming );

        if($this->tipo_de_grooming == 'Full Grooming'){
            $precio=50.00;
            $tipo_grooming = 'Full Grooming' ;
        }elseif ($this->tipo_de_grooming == 'Full Grooming Plus') {
            $precio=50.00;
            $tipo_grooming = 'Full Grooming Plus' ;
        }elseif ($this->tipo_de_grooming == 'Baño Sanitario') {
            $precio=40.00;
            $tipo_grooming = 'Baño Sanitario' ;
        }elseif ($this->tipo_de_grooming == 'Solo Baño') {
            $precio=35.00;
            $tipo_grooming = 'Solo Baño' ;
        }elseif ($this->tipo_de_grooming == 'Corte de Uñas') {
            $precio=10.00;
            $tipo_grooming = 'Corte de Uñas' ;
        }

        if (Auth::check()) {
            $user_id = Auth::id();
         }

        $fecha_selecionada = Pregrooming::where( 'fecha',  $this->fecha_cita)
                                        ->where('user_id', '<>', $user_id)->count(); 
                            
        if($fecha_selecionada > 0 ){
            $this->mensaje="Fecha ya fue seleccionada por otro usuario, pero NO HA SIDO CONFIRMADA, vuelva a intentarlo dentro de 20 minutos ";
            return;
        }

     
        $fecha_texto = date("d/m/y", strtotime($this->fecha_cita));
        
        $pregrooming->depósito_inicial = $precio;
        $pregrooming->fecha = $this->fecha_cita;
        $pregrooming->fecha_texto = $fecha_texto;
        $pregrooming->nudos = $this->nudos;
        $pregrooming->observaciones = $this->observaciones ;
        $pregrooming->perro = $pet->nombre ;
        $pregrooming->tipo_groming = $tipo_grooming;
        $pregrooming->user_id = $user_id;
        $pregrooming->pet_id =  $this->petId;
        $pregrooming->foto = $pet->foto;
        $pregrooming->save();

        $this->Pregroomings = Pregrooming::where('user_id', $user_id )->get(); 

        if($this->Pregroomings->count() == 1){
            $this->factura = true;
            $this->id_perro = $this->Pregroomings[0]->pet_id;
            $this->nombre_perro_grooming =  $this->Pregroomings[0]->perro;
            $this->fecha_grooming =  $this->Pregroomings[0]->fecha;
            $this->precio_grooming =  $this->Pregroomings[0]->depósito_inicial;
            $this->tipo_groming_grooming =  $this->Pregroomings[0]->tipo_groming;
            $this->foto_groming =  $this->Pregroomings[0]->foto;
        }else {
            $this->factura=false;
            $this->precio_total_grooming = Pregrooming::where('user_id', $user_id )->sum('depósito_inicial'); 
        }

         $this->dispatch('show-modal-factura'); 
    }

     public function confirmaPay(){

        $this->validate([
                
                'foto_pago' => 'required|image|max:2048'
         ]);

        $namephoto = md5($this->foto_pago . microtime()).'.'.$this->foto_pago->extension();
        $this->foto_pago->storeAs('foto_pago', $namephoto);

         if (Auth::check()) {
            $user_id = Auth::id();
         }

        $pregroomings = Pregrooming::where('user_id', $user_id )->get(); 
        

        if($pregroomings->count() == 1){

            $grooming = new Grooming;
            $grooming->Cancelado = 'No';
            $grooming->cobro_multiple = 'No';
            $grooming->depósito_validado = 'No';
            $grooming->fecha_texto =  $pregroomings[0]->fecha_texto;
            $grooming->user_id =  $pregroomings[0]->user_id;
            $grooming->pet_id =  $pregroomings[0]->pet_id;
            $grooming->fecha =   $pregroomings[0]->fecha;
            $grooming->monto_depósito_inicial =  $pregroomings[0]->depósito_inicial;
            $grooming->precio_grooming =  $pregroomings[0]->depósito_inicial * 2 ;
            $grooming->nudos =  $pregroomings[0]->nudos;
            $grooming->observaciones =  $pregroomings[0]->observaciones;
            $grooming->tipo_de_grooming =  $pregroomings[0]->tipo_groming;
            $grooming->pago_en_efectivo =  "No";
            $grooming->realizado =  "No";
            $grooming->solicitar_pago =  "No";
            $grooming->comprobante_deposito =  $namephoto;
            $grooming->save();

        }else{

            foreach ($pregroomings as  $pregrooming) {
                $grooming = new Grooming;
                $grooming->Cancelado = 'No';
                $grooming->cobro_multiple = 'No';
                $grooming->depósito_validado = 'No';
                $grooming->fecha_texto =  $pregroomings[0]->fecha_texto;
                $grooming->user_id =  $pregrooming->user_id;;
                $grooming->pet_id =  $pregrooming->pet_id;;
                $grooming->fecha =   $pregrooming->fecha;
                $grooming->monto_depósito_inicial =  $pregrooming->depósito_inicial;
                $grooming->precio_grooming =  $pregrooming->depósito_inicial *2 ;
                $grooming->nudos =  $pregrooming->nudos;
                $grooming->observaciones =  $pregrooming->observaciones;
                $grooming->tipo_de_grooming =  $pregrooming->tipo_groming;
                $grooming->pago_en_efectivo =  "No";
                $grooming->realizado =  "No";
                $grooming->solicitar_pago =  "No";
                $grooming->comprobante_deposito =  $namephoto;
                $grooming->save();

            }
        
        }

        $pregrooming_delete = Pregrooming::where('user_id', $user_id );
        $pregrooming_delete->delete();

         $this->reset('petId','observaciones','tipo_de_grooming','nudos','fecha_cita','foto_pago');
         return redirect()->to('/home');

    }

   public function next()
    {

        $this->hora_cita = false;
        $this->activo_10 = false;
        $this->activo_2  = false;
        $this->activo_4  = false;
        $this->hora_select_1 = false;
        $this->hora_select_2 = false;
        $this->hora_select_3 = false;
        $this->cita = ""; 
        $this->fecha_cita = "";
        $this->fecha_cita2 = "";
        $this->fecha_texto = "";
        $this->class_dia_1 = false;
        $this->class_dia_2 = false;
        $this->class_dia_3 = false;
        $this->class_dia_4 = false;
        $this->class_dia_5 = false;

        $this->dias = collect(range(1, 7));
        $this->fecha = $this->fecha->endOfWeek();
        foreach ( $this->dias as $key => $value) {  
             $fecha_texto = date("d/m/y", strtotime($this->fecha->add($value, 'day')));
             $cant = Grooming::where('fecha_texto', $fecha_texto )->count();  
             $this->dias[$key]=['dia'=> $value, 'fecha'=>$this->fecha->add($value, 'day'), 'status_hora'=> $cant];
        }

        $this->fecha=$this->dias[6]['fecha'];
        $fecha_act = $this->fecha->startOfWeek();
        $this->mes = date("M", strtotime( $fecha_act));
    }

    public function previous()
    {
        $this->hora_cita = false;
        $this->activo_10 = false;
        $this->activo_2  = false;
        $this->activo_4  = false;
        $this->hora_select_1 = false;
        $this->hora_select_2 = false;
        $this->hora_select_3 = false;
        $this->cita = ""; 
        $this->fecha_cita = "";
        $this->fecha_cita2 = "";
        $this->fecha_texto = "";
        $this->class_dia_1 = false;
        $this->class_dia_2 = false;
        $this->class_dia_3 = false;
        $this->class_dia_4 = false;
        $this->class_dia_5 = false;

        $this->dias = collect(range(7, 1));
        $this->fecha = $this->fecha->startOfWeek();
        foreach ( $this->dias as $key => $value) {  
             $fecha_texto = date("d/m/y", strtotime($this->fecha->sub($value, 'day')));
             $cant = Grooming::where('fecha_texto', $fecha_texto )->count();  

             $this->dias[$key]=['dia'=> $value, 'fecha'=>$this->fecha->sub($value, 'day'), 'status_hora'=> $cant];  
        }
        $this->fecha=$this->dias[6]['fecha'];
        $fecha_act = $this->fecha->startOfWeek();
        $this->mes = date("M", strtotime( $fecha_act));
    }

     public function dia($fecha, $dia=0){


        if($dia == 0){
            $this->class_dia_1 = false;
            $this->class_dia_2 = false;
            $this->class_dia_3 = false;
            $this->class_dia_4 = false;
            $this->class_dia_5 = false;
        }
        if($dia == 1){
            $this->class_dia_1 = true;
            $this->class_dia_2 = false;
            $this->class_dia_3 = false;
            $this->class_dia_4 = false;
            $this->class_dia_5 = false;
        }
        if($dia == 2){
            $this->class_dia_1 = false;
            $this->class_dia_2 = true;
            $this->class_dia_3 = false;
            $this->class_dia_4 = false;
            $this->class_dia_5 = false;
        }
        if($dia == 3){
            $this->class_dia_1 = false;
            $this->class_dia_2 = false;
            $this->class_dia_3 = true;
            $this->class_dia_4 = false;
            $this->class_dia_5 = false;
        }
        if($dia == 4){
            $this->class_dia_1 = false;
            $this->class_dia_2 = false;
            $this->class_dia_3 = false;
            $this->class_dia_4 = true;
            $this->class_dia_5 = false;
        }
        if($dia == 5){
            $this->class_dia_1 = false;
            $this->class_dia_2 = false;
            $this->class_dia_3 = false;
            $this->class_dia_4 = false;
            $this->class_dia_5 = true;
        }


        $this->fecha_cita2 = $fecha;
        $this->hora_cita = true;
        $this->cita="";
        $this->mensaje="";

        $this->activo_10 = false;
        $this->activo_2 = false;
        $this->activo_4 = false;
      
        date_default_timezone_set('America/Caracas');

        $fecha_dia = date("M d, Y", strtotime($fecha));
        $cita_hora_10_am =  $fecha_dia.' '.'10:00 am';         
        $cita_hora_2_pm  =  $fecha_dia.' '.'2:00 pm';         
        $cita_hora_4_pm  =  $fecha_dia.' '.'4:00 pm'; 

        $diez   = strtotime( $cita_hora_10_am );
        $dos    = strtotime( $cita_hora_2_pm );
        $cuatro = strtotime( $cita_hora_4_pm );
     
        $hoy = CarbonImmutable::now();
        $hoy = strtotime( $hoy );
       
        $status_diez   = false;
        $status_dos    = false;
        $status_cuatro = false;

        if( $hoy >= $diez ){
            $status_diez = true;
        }
        if( $hoy >= $dos ){
                $status_dos  = true;
        }
        if( $hoy >= $cuatro ){
            $status_cuatro = true;      
        }

        $citas = Grooming::where('fecha', $cita_hora_10_am )->get();  
     
        if(empty($citas[0]->fecha)){
            $this->hora_select_1 = false;
        }else{
            $this->hora_select_1 = true;
            $citas="";
        }

        if( $status_diez ){
            $this->hora_select_1 = true;
            $citas="";
           }

        $citas = Grooming::where('fecha', $cita_hora_2_pm )->get(); 
       
        if(empty($citas[0]->fecha)){
            $this->hora_select_2 = false; 
        }else{
             $this->hora_select_2 = true;
              $citas="";
        }

        if( $status_dos ){
            $this->hora_select_2 = true;
            $citas="";
           }

        $citas = Grooming::where('fecha', $cita_hora_4_pm )->get(); 

        if(empty($citas[0]->fecha)){
            $this->hora_select_3 = false;
        }else{
            $this->hora_select_3 = true;
            $citas="";
        }

        if( $status_cuatro ){
            $this->hora_select_3 = true;
            $citas="";
           }

    }

     public function fechaCita($fecha, $hora){

        if($hora == '10:00 am') {
           $this->activo_10 = true;
           $this->activo_2 = false;
           $this->activo_4 = false;
        }

        if($hora == '2:00 pm') {
            $this->activo_2 = true;
            $this->activo_10 = false; 
            $this->activo_4 = false;
        }
        if($hora == '4:00 pm'){
            $this->activo_4 = true; 
            $this->activo_2 = false;
            $this->activo_10 = false;
        }

        $fecha = date("M d, Y", strtotime($fecha));
        $this->cita = $fecha.' '.$hora;
        $this->fecha_cita = $fecha.' '.$hora;
        $fecha_texto = date("d/m/y", strtotime($fecha));
        $this->fecha_texto = $fecha_texto;
        $this->mensaje="";

    }

    public function cerrar(){

         $this->class_dia_1 = false;
         $this->class_dia_2 = false;
         $this->class_dia_3 = false;
         $this->class_dia_4 = false;
         $this->class_dia_5 = false;

         $this->activo_10 = false;
         $this->activo_2  = false;
         $this->activo_4  = false;
         $this->hora_select_1 = false;
         $this->hora_select_2 = false;
         $this->hora_select_3 = false;

         $this->modificar_cita = false;
         $this->hora_cita = false;
         $this->mensaje="";
         $this->reset('petId','observaciones','tipo_de_grooming','nudos','cita');
         $this->dispatch('close-modal', 'confirm-pay');

    }


    public function test(){
            //$this->modalPet = false;
            $this->dispatch('show-modal'); 
        
    }

    /*#[On('resetModal')]
    public function resetModal()
    {
        $this->reset();
        $this->modalPet = true;
    }*/
}
