<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;


    public function leerDatosFormulario(){
        $this->dispatch('terminoBusqueda',$this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {
        $salario = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes',[
            'salarios'=>$salario,
            'categorias'=>$categorias
        ]);
    }
}
