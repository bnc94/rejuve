<?php

namespace App\Livewire\Auth;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    // Secciones
    public $formDatosDemograficos;
    public $formDatosContacto;
    public $formPassword;
    // Formulario
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $alergias;
    public $diaNacimiento;
    public $mesNacimiento;
    public $añoNacimiento;
    public $genero = 'default';
    public $estadoNacimiento = 'oaxaca';
    public $email;
    public $telefono;
    public $nombreEmergencia;
    public $telefonoEmergencia;
    public $password;
    public $password_confirmation;

    public $validadoDatosDemograficos;
    public $validadoDatosContacto;

    protected $messages = [
        'genero.not_in' => 'Selecciona un género válido.',
        'diaNacimiento' => 'Campo requerido.',
        'diaNacimiento.lte' => 'El número no puede ser mayor a 31.',
        'diaNacimiento.gte' => 'El número no puede ser menor a 1.',
        'mesNacimiento' => 'Campo requerido.',
        'mesNacimiento.lte' => 'El número no puede ser mayor a 12.',
        'mesNacimiento.gte' => 'El número no puede ser menor a 1.',
        'añoNacimiento' => 'Campo requerido.',
        'añoNacimiento.regex' => 'El formato debe ser aaaa.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ];

    public function mount()
    {
        $this->formDatosDemograficos = true;
        $this->formDatosContacto = false;
        $this->formPassword = false;
    }

    public function saveDatosDemograficos()
    {
        $validated = $this->validate([
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'diaNacimiento' => 'required|lte:31|gte:1',
            'mesNacimiento' => 'required|lte:12|gte:1',
            'añoNacimiento' => 'required|regex:/\d{4}/',
            'genero' => 'required|not_in:default',
            'estadoNacimiento' => 'required',
            'alergias' => 'required',
        ]);

        if ($validated) {
            $this->formDatosDemograficos = false;
            $this->formDatosContacto = true;

            $validated['nombre'] = ucfirst($validated['nombre']);
            $validated['apellidoPaterno'] = ucfirst($validated['apellidoPaterno']);
            $validated['apellidoMaterno'] = ucfirst($validated['apellidoMaterno']);

            $this->validadoDatosDemograficos = $validated;
        }
    }

    public function regresarDatosDemograficos()
    {
        $this->formDatosDemograficos = true;
        $this->formDatosContacto = false;
    }

    public function saveDatosContacto()
    {
        $validated = $this->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'telefono' => 'required|min:10|max:10',
            'nombreEmergencia' => 'required',
            'telefonoEmergencia' => 'required|min:10|max:10',
        ]);

        if ($validated) {
            $this->formDatosContacto = false;
            $this->formPassword = true;

            $this->validadoDatosContacto = $validated;
        }
    }

    public function regresarDatosContacto()
    {
        $this->formDatosContacto = true;
        $this->formPassword = false;
    }    

    public function savePassword()
    {
        $validated = $this->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $fechaNacimiento = $this->validadoDatosDemograficos['diaNacimiento'] . '-' . $this->validadoDatosDemograficos['mesNacimiento' ]. '-' . $this->validadoDatosDemograficos['añoNacimiento'];
        $formattedDate = Carbon::createFromFormat('d-m-Y', $fechaNacimiento)->format('Y-m-d');

        if ($validated) {
            $user = User::create([
                'name' => $this->validadoDatosDemograficos['nombre'],
                'apellidoPaterno' => $this->validadoDatosDemograficos['apellidoPaterno'],
                'apellidoMaterno' => $this->validadoDatosDemograficos['apellidoMaterno'],
                'fechaNacimiento' => $formattedDate,
                'genero' => $this->validadoDatosDemograficos['genero'],
                'estadoNacimiento' => $this->validadoDatosDemograficos['estadoNacimiento'],
                'alergias' => $this->validadoDatosDemograficos['alergias'],
                'email' => $this->validadoDatosContacto['email'],
                'telefono' => $this->validadoDatosContacto['telefono'],
                'nombreEmergencia' => $this->validadoDatosContacto['nombreEmergencia'],
                'telefonoEmergencia' => $this->validadoDatosContacto['telefonoEmergencia'],
                'password' => Hash::make($validated['password']),
            ]);

            Auth::login($user);
        
            return redirect(route('competencias', absolute: false));
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
