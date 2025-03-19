<div>
    <div class="flex flex-col w-full">
        @foreach ($competencia as $competencia)
            <p class="text-2xl text-center font-bold uppercase pb-6"> {{$competencia->titulo}} </p>
        @endforeach
    </div>
    @if ($fechaActual > $competencia->fechaFinal)
        <p class="uppercase font-semibold text-center mb-2">Certificado de tiempos</p>
        <x-primary-button wire:click='descargarCertificado' class="flex justify-center w-full gap-2 font-semibold">
            {{ __('Descargar') }}
        </x-primary-button>
    @else
        <p class="uppercase font-semibold text-center mb-2">Inscripción</p>
        <div x-data="data()" x-init="pruebas=[$wire.pruebas, Array($wire.pruebas.length).fill(false)]" class="flex flex-col">
            <div x-show="showPruebas" class="flex flex-col">
                <div class="flex flex-col w-full px-10 py-5 bg-blue-200 rounded-md shadow-md shadow-gray-600">
                    <p class="text-center mb-2">Escoge tus pruebas</p>
                    @foreach ($pruebas as $index => $prueba)
                        <button
                            x-on:click="clickedButtons[{{ $index }}] = !clickedButtons[{{ $index }}]; pruebas[1][{{$index}}] = clickedButtons[{{ $index }}]"
                            :class="clickedButtons[{{ $index }}] ? 'bg-green-400' : 'bg-gray-200 text-black'"
                            class="border {{count($pruebas) === $index+1 ? '': 'border-b-0'}} border-black py-2 hover:bg-green-300">
                            {{$prueba}}
                        </button>
                    @endforeach
                </div>
        
                <!-- Botones -->
                <div class="grid grid-cols-2 mt-5 gap-4">
                    <a href="{{ route('competencias')}}">
                        <x-primary-button class="flex justify-start w-full gap-2 font-semibold">
                            <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                            {{ __('Regresar') }}
                        </x-primary-button>
                    </a>
                    <x-primary-button
                        x-on:click="sigPruebas()"
                        class="flex justify-end gap-2 font-semibold">
                        {{ __('Siguiente') }}
                        <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                    </x-primary-button>
                </div>
            </div>

            <div x-show="showTalla" class="flex flex-col mt-5">
                <div class="flex flex-col w-full px-10 py-5 bg-blue-200 rounded-md shadow-md shadow-gray-600">
                    <p class="text-center mb-2">Selecciona la talla de tu playera</p>
                    
                    <select x-model="size" id="size" class="border border-gray-300 rounded-md p-2">
                        <option value="" disabled selected>Elige una talla</option>
                        <option value="chica">Chica</option>
                        <option value="mediana">Mediana</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
        
                <!-- Botones -->
                <div class="grid grid-cols-2 mt-5 gap-4">
                    <x-primary-button x-on:click="showPruebas = true, showTalla = false" class="flex justify-start gap-2 font-semibold">
                        <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                        {{ __('Regresar') }}
                    </x-primary-button>
                    <x-primary-button x-on:click="showTalla = false, showConfirmacion= true" class="flex justify-end gap-2 font-semibold">
                        {{ __('Siguiente') }}
                        <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                    </x-primary-button>
                </div>
            </div>

            <div x-show="showConfirmacion" class="flex flex-col mt-5">
                <div class="flex flex-col w-full px-10 py-5 bg-blue-200 rounded-md shadow-md shadow-gray-600">
                    <p class="text-center mb-2">Resumen</p>
                    <p class="text-lg">Talla de playera:</p>
                    <p x-show="size" class="uppercase font-semibold text-sm"><span x-text="size"></span></p>
                    <p x-show="numPruebas" class="text-lg mt-2">
                        Pruebas (<span x-text="numPruebas" class="uppercase text-sm"></span>):
                    </p>
                    <template x-for="prueba in pruebasInscritas">
                        <template x-if="prueba[1]">
                            <p x-text="prueba[0]" class="font-semibold"></p>
                        </template>
                    </template>
                </div>
        
                <!-- Botones -->
                <div class="grid grid-cols-2 mt-5 gap-4">
                    <x-primary-button x-on:click="showTalla = true, showConfirmacion = false" class="flex justify-start gap-2 font-semibold">
                        <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                        {{ __('Regresar') }}
                    </x-primary-button>
                    <x-primary-button x-on:click="showConfirmacion = true; $wire.inscribirPruebas(pruebasInscritas, size)" class="flex justify-end gap-2 font-semibold">
                        {{ __('Confirmar') }}
                        <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                    </x-primary-button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function data() {
        return {
            clickedButtons: {},
            pruebas: {},
            pruebasInscritas: {},
            showPruebas: true, 
            showTalla: false,
            showConfirmacion: false,
            size: "chica",
            numPruebas: 0,
            sigPruebas(){
                clickedButtonsTam = Object.values(this.clickedButtons).filter(value => value).length;
                if (clickedButtonsTam >= 1) {
                    this.showPruebas = false, 
                    this.showTalla = true;
                    for (let i = 0; i < this.pruebas[0].length; i++) {
                        this.pruebasInscritas[i] = [this.pruebas[0][i], this.pruebas[1][i]]
                        if (this.pruebas[1][i]) {
                            this.numPruebas = this.numPruebas + 1;
                        }
                        console.log(this.pruebas[1][i]);
                        
                    }
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "Espera",
                        text: "No has seleccionado ninguna prueba"
                    });
                }
            }
        }
    }

    document.addEventListener('alpineEvent', (event) => {
        Swal.fire({
            icon: "error",
            title: "Ya estás inscrito",
            text: "Lo sentimos, solo te puedes inscribir una vez a esta competencia"
        });
    });
</script>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush