<?php

namespace App\Livewire\Grooming;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Pet;

class ListaMascota extends Component
{
    public  $pets;
    public  $programar_cita = false;

    public function render()
    {

        if (Auth::check()) {
            $id = Auth::id();
         }

        $this->pets = Pet::where('user_id', $id )
                         ->orderByDesc('id')
                         ->get(); 

        return view('livewire.grooming.lista-mascota');
    }

     public function programarCita(){

        if($this->programar_cita == false){
           $this->programar_cita = true;
        }elseif($this->programar_cita == true){
            $this->programar_cita = false;
        }

    }

    public function cita(){
          return redirect()->to('/cita');
    }
}
