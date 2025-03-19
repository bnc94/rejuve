<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Inscripcion as ModelsInscripcion;

class Inscripcion extends Component
{
    public $competencia;
    public $pruebas;
    public $fechaActual;

    public function inscribirPruebas($arrayPruebas, $tallaPlayera)
    {
        $cantidad = 0;
        $pruebasInscritas='';
        foreach ($arrayPruebas as $prueba) {
            if ($prueba[1] === true) {
                $pruebasInscritas = $pruebasInscritas . $prueba[0]  . ',';
                $cantidad = $cantidad + 1;
            }
        }
        $pruebasInscritas = substr($pruebasInscritas, 0, -1);
        
        $user = Auth::user();
        $competencia = $this->competencia[0];

        $inscripcion = ModelsInscripcion::where('user_id', $user->id)->get();

        if (sizeof($inscripcion) > 0 && $inscripcion[0]->pagado === 'si') {
            $this->dispatch('alpineEvent');
        } else {
            if (sizeof($inscripcion) > 0 && $inscripcion[0]->pagado === 'no') {
                $inscripcion[0]->delete();
            }

            $current_date = date('Y-m-d');
            $birth_date = $competencia->fechaInicio;
            $birth_timestamp = strtotime($birth_date);
            $current_timestamp = strtotime($current_date);
            $diff_seconds = $current_timestamp - $birth_timestamp;
            $age_years = $diff_seconds / (60 * 60 * 24 * 365.25);
            $edad = intval($age_years);

            ModelsInscripcion::create([
                'competencia_id' => $competencia->id,
                'user_id' => $user->id,
                'pruebas' => $pruebasInscritas,
                'talla_playera' => $tallaPlayera,
                'edad' => $edad,
                'pagado' => 'no',
            ]);
            
            $this->redirectRoute('checkout', ['cantidad' => $cantidad]);
        }
    }

    public function descargarCertificado()
    {
        $competencia = $this->competencia[0];
        $user = Auth::user();
        $data = [
            'nombre' => $user->name . ' ' . $user->apellidoPaterno . ' ' . $user->apellidoMaterno,
            'competencia' => $competencia->titulo,
            'fechaInicio' => date('d-m-Y',strtotime($competencia->fechaInicio)),
            'fechaFinal' => date('d-m-Y',strtotime($competencia->fechaFinal)),
        ];

        $pdf = Pdf::loadView('mail.certificado', $data)
        ->setPaper('a4', 'landscape');;

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Certificado de tiempos ' . $data['nombre'] . '.pdf');
    }

    public function render()
    {
        $this->fechaActual = date("Y-m-d");
        return view('livewire.inscripcion');
    }
}
