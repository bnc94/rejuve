<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\PruebasInscritas as MailPruebasInscritas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Inscripcion as ModelsInscripcion;

class Inscripcion extends Component
{
    public $competencia;
    public $pruebas;
    public $fechaActual;

    public function inscribirPruebas($arrayPruebas, $tallaPlayera)
    {
        $pruebasInscritas='';
        foreach ($arrayPruebas as $prueba) {
            if ($prueba[1] === true) {
                $pruebasInscritas = $pruebasInscritas . $prueba[0]  . ',';
            }
        }
        $pruebasInscritas = substr($pruebasInscritas, 0, -1);
        
        $user = Auth::user();
        $competencia = $this->competencia[0];

        $inscripcion = ModelsInscripcion::where('user_id', $user->id)->get();

        if (sizeof($inscripcion) > 0) {
            $this->dispatch('alpineEvent', 'Hello from Livewire!');
        } else {
            ModelsInscripcion::create([
                'competencia_id' => $competencia->id,
                'user_id' => $user->id,
                'pruebas' => $pruebasInscritas,
                'talla_playera' => $tallaPlayera,
            ]);

            $inscripcion = ModelsInscripcion::where('user_id', $user->id)->get();
            $nombre_competencia = $competencia->titulo;
            $nombre_usuario = $user->name;
            Mail::to($user->email)->send(new MailPruebasInscritas($inscripcion, $nombre_competencia, $nombre_usuario));
        }
    }

    public function render()
    {
        $this->fechaActual = date("Y-m-d");
        return view('livewire.inscripcion');
    }
}
