<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 black:text-gray-100">
                    <h1 class="text-2xl font-bold text-center mb-12">Candidatos Vacantes : {{ $vacante->titulo }}</h1>


                   <div class="md:flex md:justify-center p-5">

                         <ul class="divide-y divide-gray-200 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 flex items-center">

                                    <div class="flex-1">
                                     <p class="text-xl font-medium text-gray-800">
                                      {{ $candidato->user->name }}
                                    </p>
                                    <p class="text-xl font-medium text-gray-800">
                                        {{ $candidato->user->email }}
                                      </p>
                                      <p class="text-xl font-medium text-gray-800">Dia que se postulo: 
                                     <span class="font-normal">{{ $candidato->created_at->diffForHumans() }}</span>   
                                      </p>
                                    </div>
                                    <div>
                                        <a class="inline-flex items-center px-4 py-1.5 border border-gray-300 text-sm font-medium rounded-full text-gray-700 bg-white shadow-lg hover:bg-blue-600 hover:text-white transition duration-300 ease-in-out" 
                                        href="{{ asset('storage/' . $candidato->cv) }}" 
                                        target="_blank" 
                                        rel="noreferrer noopener">
                                        Ver CV
                                     </a>
                                     
                                    </div>

                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos aun</p>
                            @endforelse

                         </ul>

                   </div>
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
