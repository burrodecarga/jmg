<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Periodo;

class SelectPeriodoLectivo extends Component
{
    public $periodo_id;
    public function render()
    {
        $periodos = Periodo::orderBy('year')->get();

        return view('livewire.select-periodo-lectivo', compact('periodos'));
    }

    public function selectLectivo()
    {
        DB::table('periodos')
            ->update(['current' => 0]);
        DB::table('periodos')->where('id', $this->periodo_id)
            ->update(['current' => 1]);
        $message = __('the action was completed successfully.');
        flash()->options([
            'timeout' => 1000,
        ])->success($message);
    }
}
