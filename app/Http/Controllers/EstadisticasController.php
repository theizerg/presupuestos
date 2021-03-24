<?php

namespace App\Http\Controllers;
use App\Models\Presupuesto;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function presupuestos()
    {
        $monthlyCounts = Presupuesto::select(
			\DB::raw('MONTH(created_at) as month'), 
			\DB::raw('COUNT(1) as count')
		)->groupBy('month')->get()->toArray();
		// [ ['month'=>11, 'count'=>3] ]
		// [0, 0, 0, 0, ..., 3, 0]

        //dd($monthlyCounts);
		$counts = array_fill(0, 12, 0); // index, qty, value
		foreach ($monthlyCounts as $monthlyCount) {
			$index = $monthlyCount['month']-1;
			$counts[$index] = $monthlyCount['count'];
		}
    }
}
