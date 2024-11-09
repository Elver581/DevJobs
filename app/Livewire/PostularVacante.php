<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
   use WithFileUploads;
    public $cv;
    public $vacante;


    protected $rules = [
    'cv' => 'required|file|mimes:pdf|max:1024',
    ];


    public function mount(Vacante  $vacante){
        $this->vacante = $vacante;

    }

    public function postularme()
    {
        $this->validate();
        

        //Almacenar CV en el disco duro
        $cv=$this->cv->store('storage/cv');
  
        $datos['cv'] = str_replace('public/','',$cv);


        //Crear el candidato al vacante

        $this->vacante->candidatos()->create([
            'user_id'=> auth()->user()->id,
            'cv'=>$datos['cv']

        ]);

        // Crear notificacion  y enviar email 
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo, auth()->user()->id));


        // Mostrar el usuario mensaje de ok
        session()->flash('mensaje', 'Se envio correctamente tu informacion, Exitos');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
