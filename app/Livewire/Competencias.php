<?php

namespace App\Livewire;

use App\Models\Competencia;
use Livewire\Component;

class Competencias extends Component
{
    public $competencias;
    public $fechaCompetencia;
    public $fechaActual;

    public function listarCompetencias($disciplina)
    {
        $meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

        $this->fechaCompetencia = null;
        $this->fechaActual = date("Y-m-d");
        $añoActual = getdate();
        $mesActual = $añoActual['mon'];
        $mesAnterior = $mesActual - 1;
        $añoActual = $añoActual['year'];
        
        $this->competencias = Competencia::where('disciplina', $disciplina)->where('fechaInicio', '>=', date('Y-'.$mesAnterior.'-d'))->get();
        
        foreach ($this->competencias as $competencia) {
            if ($añoActual == date("Y", strtotime($competencia->fechaInicio))) {
                $this->fechaCompetencia[] = intval(date("d", strtotime($competencia->fechaInicio))) . " " . $meses[date("n", strtotime($competencia->fechaInicio)) - 1] . " " . " al " . " " . intval(date("d", strtotime($competencia->fechaFinal))) . " " . $meses[date("n", strtotime($competencia->fechaFinal)) - 1];
            } else {
                $this->fechaCompetencia[] = intval(date("d", strtotime($competencia->fechaInicio))) . " " . $meses[date("n", strtotime($competencia->fechaInicio)) - 1] . " " . date("Y", strtotime($competencia->fechaInicio)) . " " . " al " . " " . intval(date("d", strtotime($competencia->fechaFinal))) . " " . $meses[date("n", strtotime($competencia->fechaFinal)) - 1] . " " . date("Y", strtotime($competencia->fechaFinal));
            }
        }
    }

    public function render()
    {
        return view('livewire.competencias');
    }
}
