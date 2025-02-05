<form class="md:w-1/2 space-y-5"wire:submit.prevent='crearVacante'>
    <div class="mt-4">
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
        id="titulo" class="block mt-1 w-full"
         type="text" 
         wire:model="titulo"
          :value="old('titulo')" 
         placeholder="Titulo vacantes" />
         @error('titulo')

         <livewire:mostrar-alerta :message="$message">
                 @enderror
       
    </div>
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        @error('salario')

        <livewire:mostrar-alerta :message="$message">
                @enderror
          
        <select 
              id="salario" 
               wire:model ="salario"
               class="round-md shadow border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"

              >
       <option>--Selecione--</option>
       @foreach ($salarios as $salario )
           <option value="{{ $salario->id }}"> {{ $salario->salario }} </option>
       @endforeach
            </select>
    </div>
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoria')" />
        @error('categoria')

        <livewire:mostrar-alerta :message="$message">
                @enderror
        <select 
              id="categoria" 
               wire:model ="categoria"
             class="round-md shadow border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"

              >
              <option>--Selecione--</option>
              @foreach ($categorias as $categoria )
                  <option value="{{ $categoria->id }}"> {{ $categoria->categoria }} </option>
              @endforeach
            </select>
    </div>
    <div class="mt-4">
        <x-input-label for="empresa" :value="__('Empresa')" />
        @error('empresa')

        <livewire:mostrar-alerta :message="$message">
                @enderror
        <x-text-input 
        id="empresa" class="block mt-1 w-full"
         type="text"
          wire:model="empresa" :value="old('empresa')" 
         placeholder="Empresa: eje. Netflix, Uber, Shopy" />
       
    </div>
    <div class="mt-4">
        <x-input-label for="ultimo_dia" :value="__('Ultimo Dia')" />
        @error('ultimo_dia')

        <livewire:mostrar-alerta :message="$message">
                @enderror
        <x-text-input 
        id="ultimo_dia" class="block mt-1 w-full"
         type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" 
        />
       
    </div>
    <div class="mt-4">
        <x-input-label for="descripcion" :value="__('descripcion')" />
        
      <textarea
      wire:model="descripcion"
      placeholder="Descripcion general del puesto, Experiencia"
      class="block font-medium text-sm text-gray-700 dark:text-gray-300 w-full h-72"
      >
        
      </textarea>
       
    </div>
    <div class="mt-4">
        <x-input-label for="imagen" :value="__('Imagen')" />
        
        <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen temporal">
            @endif
        </div>
    
        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full"
            type="file" 
            wire:model="imagen" 
            accept="image/*" 
        />
    </div>
    

    <x-primary-button>
        Crear Vacantes
    </x-primary-button>
    
</form>
