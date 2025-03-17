<div>
    <form wire:submit='saveDatosDemograficos' class={{$formDatosDemograficos ? '':'hidden'}} novalidate>
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" wire:model='nombre' class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellido Paterno -->
        <div class="mt-4">
            <x-input-label for="apellidoPaterno" :value="__('Apellido Paterno')" />
            <x-text-input id="apellidoPaterno" wire:model="apellidoPaterno"  class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('apellidoPaterno')" class="mt-2" />
        </div>

        <!-- Apellido Materno -->
        <div class="mt-4">
            <x-input-label for="apellidoMaterno" :value="__('Apellido Materno')" />
            <x-text-input id="apellidoMaterno" class="block mt-1 w-full" type="text" wire:model="apellidoMaterno" />
            <x-input-error :messages="$errors->get('apellidoMaterno')" class="mt-2" />
        </div>

        <!-- Fecha de nacimiento -->
        <div class="mt-4">
            <x-input-label :value="__('Fecha de nacimiento')" />
            <div class="flex justify-start items-center gap-1">
                <div class="flex flex-col">
                    <input 
                        type="text" 
                        wire:model="diaNacimiento" 
                        class="text-center w-14 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1" 
                        placeholder="dd"
                    >
                    @error('diaNacimiento')
                        <p class="text-red-600 text-sm"> {{ $message }} </p>
                    @enderror
                </div>

                <p class="text-gray-300">-</p>

                <div class="flex flex-col">
                    <input 
                        type="text" 
                        wire:model="mesNacimiento" 
                        class="text-center w-14 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1" 
                        placeholder="mm"
                    >
                    @error('mesNacimiento')
                        <p class="text-red-600 text-sm"> {{ $message }} </p>
                    @enderror
                </div>

                <p class="text-gray-300">-</p>

                <div class="flex flex-col">
                    <input 
                        type="text" 
                        wire:model="añoNacimiento"
                        class="text-center w-16 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1" 
                        placeholder="aaaa"
                    >
                    @error('añoNacimiento')
                        <p class="text-red-600 text-sm"> {{ $message }} </p>
                    @enderror
                </div>
                
            </div>
        </div>

        <!-- Género -->
        <div class="mt-4">
            <x-input-label for="genero" :value="__('Género')" />
            <select id="genero" wire:model="genero" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1" >
                <option value="default" disabled>Elige una opción</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
    
            @error('genero')
                <p class="text-red-600 text-sm"> {{ $message }} </p>
            @enderror
        </div>

        <!-- Estado de nacimiento -->
        <div class="mt-4">
            <x-input-label for="estadoNacimiento" :value="__('Estado de nacimiento')" />
            <select id="estadoNacimiento" wire:model="estadoNacimiento" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1" >
                <option value="">Elige un estado</option>
                <option value="aguascalientes">Aguascalientes</option>
                <option value="baja_california">Baja California</option>
                <option value="baja_california_sur">Baja California Sur</option>
                <option value="campeche">Campeche</option>
                <option value="coahuila">Coahuila</option>
                <option value="colima">Colima</option>
                <option value="chiapas">Chiapas</option>
                <option value="chihuahua">Chihuahua</option>
                <option value="cdmx">Ciudad de México</option>
                <option value="durango">Durango</option>
                <option value="guanajuato">Guanajuato</option>
                <option value="guerrero">Guerrero</option>
                <option value="hidalgo">Hidalgo</option>
                <option value="jalisco">Jalisco</option>
                <option value="edo_mex">Estado de México</option>
                <option value="michoacan">Michoacán</option>
                <option value="morelos">Morelos</option>
                <option value="nayarit">Nayarit</option>
                <option value="nuevo_leon">Nuevo León</option>
                <option value="oaxaca">Oaxaca</option>
                <option value="puebla">Puebla</option>
                <option value="queretaro">Querétaro</option>
                <option value="quintana_roo">Quintana Roo</option>
                <option value="san_luis_potosi">San Luis Potosí</option>
                <option value="sinaloa">Sinaloa</option>
                <option value="sonora">Sonora</option>
                <option value="tabasco">Tabasco</option>
                <option value="tamaulipas">Tamaulipas</option>
                <option value="tlaxcala">Tlaxcala</option>
                <option value="veracruz">Veracruz</option>
                <option value="yucatan">Yucatán</option>
                <option value="zacatecas">Zacatecas</option>
            </select>
    
            @error('estadoNacimiento')
                <p class="text-red-600 text-sm"> {{ $message }} </p>
            @enderror
        </div>

        <!-- Alergias -->
        <div class="mt-4">
            <x-input-label for="alergias" :value="__('Alergias')" />
            <x-text-input id="alergias" wire:model="alergias" class="block mt-1 w-full" type="text" />
            <x-input-error :messages="$errors->get('alergias')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="flex justify-start gap-2 font-semibold">
                {{ __('Continuar') }}
                <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
            </x-primary-button>
        </div>
    </form>
    
    {{-- Datos de contacto --}}
    <form wire:submit='saveDatosContacto' class={{$formDatosContacto ? '':'hidden'}} novalidate>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="number" wire:model="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <p class="mt-4 mb-2 font-semibold text-gray-700 text-lg uppercase">Contacto de emergencia</p>
        <!-- Nombre contacto de emergencia -->
        <div class="mt-1">
            <x-input-label for="nombreEmergencia" :value="__('Nombre de emergencia')" />
            <x-text-input id="nombreEmergencia" class="block mt-1 w-full" type="text" wire:model="nombreEmergencia" />
            <x-input-error :messages="$errors->get('nombreEmergencia')" class="mt-2" />
        </div>

        <!-- Teléfono de emergencia -->
        <div class="mt-4">
            <x-input-label for="telefonoEmergencia" :value="__('Teléfono de emergencia')" />
            <x-text-input id="telefonoEmergencia" class="block mt-1 w-full" type="number" wire:model="telefonoEmergencia" />
            <x-input-error :messages="$errors->get('telefonoEmergencia')" class="mt-2" />
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between mt-4 gap-4">
            <x-primary-button type="button" wire:click='regresarDatosDemograficos' class="flex justify-start gap-2 font-semibold">
                <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                {{ __('Regresar') }}
            </x-primary-button>

            <x-primary-button class="flex justify-start gap-2 font-semibold">
                {{ __('Continuar') }}
                <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
            </x-primary-button>
        </div>
    </form>

    {{-- Password --}}
    <form wire:submit='savePassword' class={{$formPassword ? '':'hidden'}} novalidate>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            wire:model="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            wire:model="password_confirmation" 
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botones -->
        <div class="flex items-start justify-between mt-4 gap-4">
            <x-primary-button type="button" wire:click='regresarDatosContacto' class="flex justify-start gap-2 font-semibold">
                <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                {{ __('Regresar') }}
            </x-primary-button>

            <div class="flex flex-col justify-end items-start">
                <x-primary-button class="flex justify-start gap-2 font-semibold mb-4">
                    {{ __('Crear cuenta') }}
                </x-primary-button>

                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
            </div>
        </div>
    </form>
</div>
