<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
 <h3 class="text-center text-2xl font-bold my-4"> Postularme esta Vacante</h3>
@if (session()->has('mensaje'))
    <div class="uppercase border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm">
        {{ session('mensaje') }}
    </div>
    @else

    <form wire:submit.prevent='postularme' action="" class="w-96 mt-5">
    <div class="mb-4">
        <x-input-label for="cv" :value="__('Currículo o Hoja de Vida (pdf)')" />
        <input id="cv" wire:model.defer="cv"  type="file" accept=".pdf" class="block mt-1 w-full" />
    </div>
    

   @error('cv')
   
   <livewire:mostrar-alerta :message="$message" />
  @enderror

<x-primary-button class="my-y bg-slate-500">
    {{__('Postularme') }}
</x-primary-button>
 </form>
@endif
 

</div>
