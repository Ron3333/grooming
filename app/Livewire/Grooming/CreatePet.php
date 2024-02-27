<?php

namespace App\Livewire\Grooming;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\User;
use App\Models\Pet;
use Carbon\Carbon;

class CreatePet extends Component
{
    use WithFileUploads;

    public $nombre ='' ;
    public $apellido ='' ;
    public $raza ='' ;
    public $edad = 0 ;
    public $meses =1 ;
    public $sexo ='' ;
    public $size ='' ;
    public $peso =1 ;
    public $actitud ='' ;
    public $socializa = array();
    public $muerde = '';
    public $info_adicional = '';
    public $foto = '';
    public $block_social = false;
    
    public function mount()
    {
        $this->block_social = false;
       
    }

    public function render()
    {
        return view('livewire.grooming.create-pet')->layout('layouts.app'); 
    }

   public function createPet()
    {
            
         $this->validate([
                'nombre' =>'required',
                'apellido' => 'required',
                'raza' => 'required',
                'edad' => 'required|integer|digits_between:0,12',
                'sexo' => 'required',
                'size' => 'required',
                'peso' => 'required|integer|digits_between:1,50',
                'actitud' => 'required',
                'socializa' => 'required',
                'muerde' => 'required',
                'foto' => 'required|image|max:2048'
         ]);
      
         if (Auth::check()) {
            $id = Auth::id();
            $user = User::find($id);
         }
         
         $this->apellido= $user->apellido;

         $namephoto = md5($this->foto . microtime()).'.'.$this->foto->extension();
         $this->foto->storeAs('foto', $namephoto);

         $social0='';
         $social1='';
         $social2='';
         $social3='';

         if ( isset($this->socializa[0]) and  $this->socializa[0] == true) {
             $social0 = 'Personas ';
         }
         if( isset($this->socializa[1]) and $this->socializa[1] == true ) {
             $social1  = 'Perros ';
         }
         if( isset($this->socializa[2]) and $this->socializa[2] == true) {
             $social2 = 'Niños ';
         }
         if( isset($this->socializa[3]) and $this->socializa[3] == true) {
             $this->social3 = 'No socializa';
         }
         
        $currentDateTime = Carbon::now();
        $fecha_nac = Carbon::now()->subYear($this->edad)->subMonths($this->meses);
        $fecha_nac = date("M d, Y h:m a", strtotime($fecha_nac));
        
        $pet = new Pet;
        $pet->user_id = $id;
        $pet->nombre = $this->nombre;
        $pet->apellido = $this->apellido;
        $pet->raza = $this->raza;
        $pet->edad = $this->edad.' años y '.$this->meses.' meses';
        $pet->sexo = $this->sexo;
        $pet->size = $this->size;
        $pet->peso = $this->peso;
        $pet->fecha_nac = $fecha_nac;
        $pet->actitud = $this->actitud;
        $pet->socializa = $social0.' '.$social1.' '.$social2.' '.$social3;
        $pet->muerde = $this->muerde;
        $pet->foto = $namephoto;

        $pet->save();
       
        $this->resetInputFields();

        return redirect()->to('/home');

    }

     private function resetInputFields(){
        $this->nombre = '';
        $this->apellido = '';
        $this->raza = '';
        $this->edad = '';
        $this->sexo = '';
        $this->size = '';
        $this->peso = '';
        $this->actitud = '';
        $this->socializa = '';
        $this->muerde = '';
        $this->foto = '';
    }
  
    public function blocksocializa(){

        if( $this->block_social){
            $this->block_social = false;
        }else{
            $this->block_social = true;
            $this->socializa[0] = false  ;
            $this->socializa[1] = false  ;
            $this->socializa[2] = false  ; 
        }
    }
}
