<?php

namespace App\Charts;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CountLastMonthsChart extends LineChartAbstract
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($table, $label, $months = 5)
    {
        parent::__construct();

        $entities = DB::table($table)->select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(id) as count')
        )
        ->whereRaw(DB::raw("created_at >= DATE_SUB(NOW(),INTERVAL {$months} MONTH)"))
        ->groupBy('year', 'month')
        ->pluck('count', 'month');

        $arr = collect();

        for ($i = $months; $i > 0; $i--) {
            $arr->put(now()->subMonths($i-1)->month, 0);
        }

        $entities = $entities->union($arr)->sortKeys();

        $entities = $entities->mapWithKeys(function ($item, $key) {
            return [
                Carbon::create(0, $key)->locale(config('app.locale'))->monthName => $item
            ];
        });

        $this->labels($entities->keys());

        $this->dataset($label, 'line', $entities->values());
    }
}
