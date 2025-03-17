<x-guest-layout>
    <form x-data="data()" method="POST" action="{{ route('register') }}">
        @csrf

        <div x-show="infoDemo" class="flex flex-col w-full">
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" x-model="formData.name" class="block mt-1 w-full" type="text" name="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Apellido Paterno -->
            <div class="mt-4">
                <x-input-label for="apaterno" :value="__('Apellido Paterno')" />
                <x-text-input id="apaterno" x-model="formData.apaterno" class="block mt-1 w-full" type="text" name="apaterno" :value="old('apaterno')" autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('apaterno')" class="mt-2" />
            </div>
    
            <!-- Apellido Materno -->
            <div class="mt-4">
                <x-input-label for="amaterno" :value="__('Apellido Materno')" />
                <x-text-input id="amaterno" x-model="formData.amaterno" class="block mt-1 w-full" type="text" name="amaterno" :value="old('amaterno')" autofocus autocomplete="lastname" />
                <x-input-error :messages="$errors->get('amaterno')" class="mt-2" />
            </div>
    
            <!-- Fecha de nacimiento -->
            <div class="mt-4">
                <x-input-label for="fechaNacimiento" :value="__('Fecha de nacimiento')" />
                <x-text-input id="fechaNacimiento" x-model="formData.fechaNacimiento" class="block mt-1 w-full" type="date" name="fechaNacimiento" :value="old('fechaNacimiento')" value="2001-01-01" />
                <x-input-error :messages="$errors->get('fechaNacimiento')" class="mt-2" />
            </div>
    
            <!-- Género -->
            <div class="mt-4">
                <x-input-label for="genero" :value="__('Género')" />
                <select id="gender" x-model="formData.gender" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="gender" >
                    <option value="" disabled selected>Elige una opción</option>
                    <option value="male">Masculino</option>
                    <option value="female">Femenino</option>
                </select>
                <x-input-error :messages="$errors->get('genero')" class="mt-2" />
            </div>
    
            <!-- Estado de nacimiento -->
            <div class="mt-4">
                <x-input-label for="estadoNacimiento" :value="__('Estado de nacimiento')" />
                <select id="estadoNacimiento" x-model="formData.estadoNacimiento" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="estadoNacimiento" required>
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
                    <option value="oaxaca" selected>Oaxaca</option>
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
                <x-input-error :messages="$errors->get('estadoNacimiento')" class="mt-2" />
            </div>
    
            <!-- Alergias -->
            <div class="mt-4">
                <x-input-label for="alergias" :value="__('Alergias')" />
                <x-text-input id="alergias" x-model="formData.alergias" class="block mt-1 w-full" type="text" name="alergias" :value="old('alergias')" />
                <x-input-error :messages="$errors->get('alergias')" class="mt-2" />
            </div>
        
            <!-- Botones -->
            <div class="grid grid-cols-2 mt-4 gap-4">
                <div></div>
                <x-primary-button x-on:click="siguienteInfoContacto()" type="button" class="flex justify-end gap-2 font-semibold">
                    {{ __('Siguiente') }}
                    <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                </x-primary-button>
            </div>
        </div>

        {{-- Datos de contacto --}}
        <div x-show="infoContacto" class="">
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" x-model="formData.email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required  />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Teléfono -->
            <div class="mt-4">
                <x-input-label for="telefono" :value="__('Teléfono')" />
                <x-text-input id="telefono" x-model="formData.telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" required maxlength=10 />
                <p x-show="errorTelefono" class="text-red-500 text-sm mt-1">
                    El teléfono debe contener exactamente 10 dígitos numéricos.
                </p>
            </div>
    
            <p class="mt-4 text-gray-700 text-lg uppercase">Contacto de emergencia:</p>
            <!-- Nombre contacto de emergencia -->
            <div class="mt-1">
                <x-input-label for="nombreEmergencia" :value="__('Nombre de emergencia')" />
                <x-text-input id="nombreEmergencia" x-model="formData.nombreEmergencia" class="block mt-1 w-full" type="text" name="nombreEmergencia" :value="old('nombreEmergencia')" required />
                <x-input-error :messages="$errors->get('nombreEmergencia')" class="mt-2" />
            </div>
    
            <!-- Teléfono de emergencia -->
            <div class="mt-4">
                <x-input-label for="telefonoEmergencia" :value="__('Teléfono de emergencia')" />
                <x-text-input id="telefonoEmergencia" x-model="formData.telefonoEmergencia" class="block mt-1 w-full" type="number" name="telefonoEmergencia" :value="old('telefonoEmergencia')" required maxlength=10 />
                <x-input-error :messages="$errors->get('telefonoEmergencia')" class="mt-2" />
            </div>
        
            <!-- Botones -->
            <div class="grid grid-cols-2 mt-4 gap-4">
                <x-primary-button x-on:click="infoDemo = true, infoContacto = false" type="button" class="flex justify-start gap-2 font-semibold">
                    <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                    {{ __('Regresar') }}
                </x-primary-button>
                <x-primary-button x-on:click="siguientePass()" type="button" class="flex justify-end gap-2 font-semibold">
                    {{ __('Siguiente') }}
                    <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                </x-primary-button>
            </div>
        </div>

        {{--  Password --}}
        <div x-show="pass" class="">
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <div class="flex justify-between items-start mt-4">
                <x-primary-button x-on:click="infoContacto = true, pass = false" type="button" class="flex justify-start gap-2 font-semibold">
                    <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 155.139 155.139" xml:space="preserve" fill="#fff" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <polygon style="fill:#fff;" points="155.139,77.566 79.18,1.596 79.18,45.978 0,45.978 0,109.155 79.18,109.155 79.18,153.542 "></polygon> </g> </g> </g></svg>
                    {{ __('Regresar') }}
                </x-primary-button>
    
                <div class="flex flex-col justify-end gap-2">
                    <x-primary-button class="">
                        {{ __('Crear cuenta') }}
                    </x-primary-button>

                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('¿Ya tienes una cuenta?') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>

<script>
    function data() {
        return {
            infoDemo: true, 
            infoContacto: false, 
            pass: false,
            formData: {
                name: 'bbq',
                apaterno: '',
                amaterno: '',
                alergias: '',
                fechaNacimiento: new Date().toISOString().split('T')[0], // Today's date
                gender: '',
                estadoNacimiento: 'oaxaca',
                email: '',
                telefono: '',
                nombreEmergencia: '',
                telefonoEmergencia: '',
            },
            // validacion
            telefonoValidado: false,
            errorTelefono: false,

            init() {
                // Load stored values (if any) from localStorage
                const savedData = JSON.parse(localStorage.getItem('formData'));
                if (savedData) {
                    this.formData = savedData;
                    this.validateForm(); // Validate stored data on load
                }
            },

            // validateForm() {
            //     this.submitted = true;

            //     if (this.formData.name && this.isEmailValid() && this.isPhoneValid()) {
            //         alert("Formulario enviado correctamente ✅");
            //         localStorage.removeItem('formData'); // Borra datos tras envío
            //     }
            // }

            validateForm() {                
                // Save form data to localStorage
                localStorage.setItem('formData', JSON.stringify(this.formData));
            },

            siguienteInfoContacto() {
                // if (this.formData.name && this.formData.apaterno && this.formData.amaterno && this.formData.alergias && this.formData.fechaNacimiento && this.formData.estadoNacimiento && this.formData.gender) {
                    this.infoDemo = false, 
                    this.infoContacto= true
                // } else {
                //     Swal.fire({
                //         icon: "warning",
                //         title: "Espera",
                //         text: "No has completado todos los campos"
                //     });
                // }
            },
            siguientePass() {
                this.telefonoValidado = this.formData.telefono.length === 10 && /^\d+$/.test(this.formData.telefono);

                // if (this.formData.email && this.telefonoValidado && this.formData.nombreEmergencia && this.formData.telefonoEmergencia) {
                    this.infoContacto = false, 
                    this.pass = true,
                    this.errorTelefono = false;
                // } else {
                //     Swal.fire({
                //         icon: "warning",
                //         title: "Espera",
                //         text: "No has completado todos los campos"
                //     });

                //     this.errorTelefono = true;
                // }
            }
        }
    }
</script>