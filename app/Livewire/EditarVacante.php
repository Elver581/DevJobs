<?php

namespace App\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'required|image|max:1080',
        
    ];

    public function mount(Vacante $vacante)
    {
    $this->vacante_id = $vacante->id;
     $this->titulo= $vacante->titulo;
     $this->salario=$vacante->salario_id;
     $this->categoria= $vacante->categoria_id;
     $this->empresa= $vacante->empresa;
     $this->ultimo_dia= Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
     $this->descripcion = $vacante->descripcion;
     $this->imagen = $vacante->imagen;
    }
 public function editarVacante(){
     $datos = $this->validate();

     //Si hay una imagen
     
     if($this->imagen_nueva){
        $imagen= $this->imagen_nueva->store('storage/vacantes');
        $datos['imagen'] = str_replace('public/','',$imagen);
     }
     //Encontrar la vacante a editar

      $vacante= Vacante::find($this->vacante_id);


     // Asignar los valores

     $vacante->titulo= $datos['titulo'];
     $vacante->salario_id= $datos['salario'];
     $vacante->categoria_id =$datos['categoria'];
     $vacante->empresa= $datos['empresa'];
     $vacante->ultimo_dia= $datos['ultimo_dia'];
     $vacante->descripcion= $datos['descripcion'];
     $vacante->imagen= $datos['imagen']?? $vacante->imagen;

     // Guardar los valores
  $vacante->save();
    //REDIRECIONAR
  session()->flash('mensaje', 'La vacante se actualizo Correctamente');
  return redirect()->route('vacantes.index');
    
 }

    public function render()
    {
        $salarios=Salario::all();
        $categorias = Categoria::all();
        
        return view('livewire.editar-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
    }
}
