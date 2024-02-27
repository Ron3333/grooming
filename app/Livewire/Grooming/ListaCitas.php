<?php

namespace App\Livewire\Grooming;

use Illuminate\Support\Facades\Auth;
use App\Models\Grooming;
use Livewire\Component;

class ListaCitas extends Component
{
    public $citas;

    public function render()
    {

        if (Auth::check()) {
            $id = Auth::id();
        }

       $this->citas = Grooming::where('user_id', $id )->get();
      
       /*dd( $this->citas[0]->pet->nombre);
       exit();*/

        return view('livewire.grooming.lista-citas');
        
    }
}
