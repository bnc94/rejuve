<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.") }}
        </p>
    </header>

    <form method="post" id="perfilForm" action="{{ route('profile.update') }}" class="mt-6 space-y-6" onsubmit="return confirmSubmission(event)">
        @csrf
        @method('patch')

        {{-- datos demográficos --}}
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="apellidoPaterno" :value="__('Apellido Paterno')" />
            <x-text-input id="apellidoPaterno" name="apellidoPaterno" type="text" class="mt-1 block w-full" :value="old('apellidoPaterno', $user->apellidoPaterno)" />
            <x-input-error class="mt-2" :messages="$errors->get('apellidoPaterno')" />
        </div>

        <div>
            <x-input-label for="apellidoMaterno" :value="__('Apellido Materno')" />
            <x-text-input id="apellidoMaterno" name="apellidoMaterno" type="text" class="mt-1 block w-full" :value="old('apellidoMaterno', $user->apellidoMaterno)" />
            <x-input-error class="mt-2" :messages="$errors->get('apellidoMaterno')" />
        </div>

        <div>
            @php $fecha = date('d-m-Y', strtotime($user->fechaNacimiento)) @endphp
            <x-input-label for="fechaNacimiento" :value="__('Fecha de Nacimiento')" />
            <x-text-input id="fechaNacimiento" name="fechaNacimiento" type="text" class="mt-1 block w-full" :value="old('fechaNacimiento', $fecha)" />
            <x-input-error class="mt-2" :messages="$errors->get('fechaNacimiento')" />
        </div>

        <div>
            <x-input-label for="genero" :value="__('Género')" />
            <select id="genero" name="genero" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1">
                <option value="" disabled>Elige una opción</option>
                <option value="masculino" {{ old('genero', $user->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero', $user->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
    
            @error('genero')
                <p class="text-red-600 text-sm"> {{ $message }} </p>
            @enderror
        </div>

        <!-- Estado de nacimiento -->
        <div class="mt-4">
            <x-input-label for="estadoNacimiento" :value="__('Estado de nacimiento')" />
            <select id="estadoNacimiento" name="estadoNacimiento" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1" >
                <option value="" disabled>Elige un estado</option>
                <option value="aguascalientes" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'aguascalientes' ? 'selected' : '' }}>Aguascalientes</option>
                <option value="baja_california" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'baja_california' ? 'selected' : '' }}>Baja California</option>
                <option value="baja_california_sur" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'baja_california_sur' ? 'selected' : '' }}>Baja California Sur</option>
                <option value="campeche" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'campeche' ? 'selected' : '' }}>Campeche</option>
                <option value="coahuila" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'coahuila' ? 'selected' : '' }}>Coahuila</option>
                <option value="colima" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'colima' ? 'selected' : '' }}>Colima</option>
                <option value="chiapas" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'chiapas' ? 'selected' : '' }}>Chiapas</option>
                <option value="chihuahua" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'chihuahua' ? 'selected' : '' }}>Chihuahua</option>
                <option value="cdmx" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'cdmx' ? 'selected' : '' }}>Ciudad de México</option>
                <option value="durango" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'durango' ? 'selected' : '' }}>Durango</option>
                <option value="guanajuato" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'guanajuato' ? 'selected' : '' }}>Guanajuato</option>
                <option value="guerrero" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'guerrero' ? 'selected' : '' }}>Guerrero</option>
                <option value="hidalgo" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'hidalgo' ? 'selected' : '' }}>Hidalgo</option>
                <option value="jalisco" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'jalisco' ? 'selected' : '' }}>Jalisco</option>
                <option value="edo_mex" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'edo_mex' ? 'selected' : '' }}>Estado de México</option>
                <option value="michoacan" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'michoacan' ? 'selected' : '' }}>Michoacán</option>
                <option value="morelos" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'morelos' ? 'selected' : '' }}>Morelos</option>
                <option value="nayarit" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'nayarit' ? 'selected' : '' }}>Nayarit</option>
                <option value="nuevo_leon" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'nuevo_leon' ? 'selected' : '' }}>Nuevo León</option>
                <option value="oaxaca" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'oaxaca' ? 'selected' : '' }}>Oaxaca</option>
                <option value="puebla" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'puebla' ? 'selected' : '' }}>Puebla</option>
                <option value="queretaro" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'queretaro' ? 'selected' : '' }}>Querétaro</option>
                <option value="quintana_roo" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'quintana_roo' ? 'selected' : '' }}>Quintana Roo</option>
                <option value="san_luis_potosi" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'san_luis_potosi' ? 'selected' : '' }}>San Luis Potosí</option>
                <option value="sinaloa" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'sinaloa' ? 'selected' : '' }}>Sinaloa</option>
                <option value="sonora" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'sonora' ? 'selected' : '' }}>Sonora</option>
                <option value="tabasco" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'tabasco' ? 'selected' : '' }}>Tabasco</option>
                <option value="tamaulipas" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'tamaulipas' ? 'selected' : '' }}>Tamaulipas</option>
                <option value="tlaxcala" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'tlaxcala' ? 'selected' : '' }}>Tlaxcala</option>
                <option value="veracruz" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'veracruz' ? 'selected' : '' }}>Veracruz</option>
                <option value="yucatan" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'yucatan' ? 'selected' : '' }}>Yucatán</option>
                <option value="zacatecas" {{ old('estadoNacimiento', $user->estadoNacimiento) == 'zacatecas' ? 'selected' : '' }}>Zacatecas</option>
            </select>
    
            @error('estadoNacimiento')
                <p class="text-red-600 text-sm"> {{ $message }} </p>
            @enderror
        </div>

        <div>
            <x-input-label for="alergias" :value="__('Alergias')" />
            <x-text-input id="alergias" name="alergias" type="text" class="mt-1 block w-full" :value="old('alergias', $user->alergias)" />
            <x-input-error class="mt-2" :messages="$errors->get('alergias')" />
        </div>

        {{-- datos contacto --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $user->telefono)" />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>

        <div>
            <x-input-label for="nombreEmergencia" :value="__('Nombre de contacto de emergencia')" />
            <x-text-input id="nombreEmergencia" name="nombreEmergencia" type="text" class="mt-1 block w-full" :value="old('nombreEmergencia', $user->nombreEmergencia)" />
            <x-input-error class="mt-2" :messages="$errors->get('nombreEmergencia')" />
        </div>

        <div>
            <x-input-label for="telefonoEmergencia" :value="__('Teléfono de emergencia')" />
            <x-text-input id="telefonoEmergencia" name="telefonoEmergencia" type="text" class="mt-1 block w-full" :value="old('telefonoEmergencia', $user->telefonoEmergencia)" />
            <x-input-error class="mt-2" :messages="$errors->get('telefonoEmergencia')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            title: "¡Información guardada!",
                            text: "Tu perfil ha sido actualizado.",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    });
                </script>
            @endif
        </div>
    </form>
</section>

<script>
    let originalEmail = document.getElementById("email").value;

    function confirmSubmission(event) {
        let currentEmail = document.getElementById("email").value;

        if (originalEmail !== currentEmail) { 
            event.preventDefault();
            Swal.fire({
                title: "Atención",
                text: "Si modificas tu email deberás volver a confirmarlo. ¿Quieres continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("perfilForm").submit();
                }
            });
        }
    }
</script>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush