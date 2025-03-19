<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion as ModelsInscripcion;
use App\Mail\PruebasInscritas as MailPruebasInscritas;
use App\Models\Competencia;
use Illuminate\Support\Facades\Mail;

class PagoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $inscripcion = ModelsInscripcion::where('user_id', $user->id)->get();

        $competencia = Competencia::where('id', $inscripcion[0] ->competencia_id)->get();

        // $user->stripe_id = "NULL";
        // $user->save();

        $inscripcion[0]->pagado = 'si';
        $inscripcion[0]->save();

        Mail::to($user->email)->send(new MailPruebasInscritas($inscripcion, $competencia[0]->titulo, $user->name));
        
        return view('pago-completado');
    }
}
