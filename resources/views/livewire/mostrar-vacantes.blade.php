
<div>
    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">

@forelse ( $vacantes as $vacante )
    
    <div class="p-6 text-gray-900 black:text-gray-200 md:flex md:justify-between mt:items-center">
       <div class="leading-10">
        <a href="{{ route('vacantes.show',$vacante->id) }}" class="text-xl font-bold">
            {{ $vacante->titulo }}
        </a>
        <p class=" text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
        <p class="text-sm text-gray-600">Último día: {{ $vacante->ultimo_dia ? \Carbon\Carbon::parse($vacante->ultimo_dia)->format('d/m/Y') : 'Fecha no disponible' }}</p>

        </div> 
        <div class="flex flex-col md:flex-row items-center  gap-3  mt-5 md:mt-0">
     <a class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center w-full md:w-auto" href="{{ route('candidato.inex', $vacante) }}">
      {{ $vacante->candidatos->count() }}
      Candidatos
     </a>
     <a class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center w-full md:w-auto" href="{{ route('vacantes.edit',$vacante->id) }}">
        Editar
         </a>
         <button
         wire:click="$dispatch('mostrarAlerta',{id:{{ $vacante->id }} })"
          class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center w-full md:w-auto" href="#">
            Eliminar
         </button>
        </div>
    </div>  
 
@empty
<p class="p-3 text-center text-sm text-gray-600"> No hay vacantes</p>
@endforelse

</div>
<div class="flex justify-center mt-10">{{ $vacantes->links() }}</div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  

<script>

document.addEventListener('livewire:initialized', () => {
            Livewire.on('mostrarAlerta', ({ id }) => {
    Swal.fire({
    title: 'Eliminar Vacante?',
    text: "Una Vacante No se puede Eliminar!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar',

}).then((result) => {
  if (result.isConfirmed) {
//Eliminar VAcante
@this.call('eliminarVacante',id);
    Livewire:
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
})
    })
    
</script>
@endpush
