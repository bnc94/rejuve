<div>
    <p class="text-2xl sm:text-4xl text-center font-bold uppercase pb-6">competencias</p>

    <div x-data="data()" class="flex flex-col justify-center items-center mb-5">
        <button x-text="textoBoton" x-on:click="open = !open" class="w-full inline-flex justify-center items-center uppercase bg-sky-900 hover:bg-sky-800 rounded-md px-4 py-2 transition ease-in-out duration-150 text-white"></button>

        <div x-show="open" x-on:click.away="open = false" class="flex flex-col w-full">
            <button x-on:click="textoBoton = 'Natación'; open = false; $wire.listarCompetencias('natación')" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 transition ease-in-out duration-150">
                Natación
            </button>
            <button x-on:click="textoBoton = 'Atletismo'; open = false; $wire.listarCompetencias('atletismo')" class="bg-gray-200 hover:bg-gray-400 px-4 py-2 transition ease-in-out duration-150">
                Atletismo
            </button>
            <button x-on:click="textoBoton = 'Ciclismo'; open = false; $wire.listarCompetencias('ciclismo')" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 transition ease-in-out duration-150">
                Ciclismo
            </button>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center gap-4">
        @if ($competencias)
            @foreach ($competencias as $index => $competencia)
                @if ($fechaActual < $competencia->fechaInicio)
                    <a href="{{ route('competencias.show', $competencia->titulo) }}" class="bg-blue-200 w-full px-4 py-2 rounded-2xl shadow-md shadow-gray-600 cursor-pointer">
                        <p class="text-sm mb-2">{{$fechaCompetencia[$index]}}</p>
                        <p class="capitalize font-semibold mb-4">{{$competencia->titulo}}</p>
                        <p class="capitalize text-sm">{{$competencia->ubicacion}}</p>
                    </a>
                @elseif ($fechaActual > $competencia->fechaFinal)
                    <a href="{{ route('competencias.show', $competencia->titulo) }}" class="bg-blue-200 w-full px-4 py-2 rounded-2xl shadow-md shadow-gray-600 cursor-pointer">
                        <p class="text-sm mb-2">{{$fechaCompetencia[$index]}}</p>
                        <p class="capitalize font-semibold mb-1">{{$competencia->titulo}}</p>
                        <p class="capitalize text-xs mb-4">Descargar resultados</p>
                        <p class="capitalize text-sm">{{$competencia->ubicacion}}</p>
                    </a>
                @else
                    <a href="#" class="bg-gray-400 w-full px-4 py-2 rounded-2xl shadow-md shadow-gray-600">
                        <p class="text-sm mb-2">{{$fechaCompetencia[$index]}}</p>
                        <p class="capitalize font-semibold mb-4">{{$competencia->titulo}}</p>
                        <p class="capitalize text-sm">{{$competencia->ubicacion}}</p>
                    </a>
                @endif
            @endforeach
        @endif
    </div>
</div>

<script>
    function data() {
        return {
            open: false,
            textoBoton: 'selecciona una disciplina'
        }
    }
</script>