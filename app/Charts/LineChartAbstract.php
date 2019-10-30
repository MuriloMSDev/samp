<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

abstract class LineChartAbstract extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->options([
            'responsive' => true,
            'legend'=> [
                'display'=> false,
            ],
            'scales'=> [
                'xAxes'=> [[
                    'ticks' => [
                        'fontColor'=> '#efefef',
                    ],
                    'gridLines' => [
                        'display' => false,
                        'color'=> '#efefef',
                        'drawBorder'=> false,
                    ]
                ]],
                'yAxes'=> [[
                    'ticks' => [
                        'fontColor'=> '#efefef',
                        'stepSize'=> 1
                    ],
                    'gridLines' => [
                        'display' => true,
                        'color'=> '#efefef',
                        'drawBorder'=> false,
                    ]
                ]]
            ]
        ])->height(250);
    }

    /**
     * Adds a new dataset to the chart.
     *
     * @param string           $name
     * @param array|Collection $data
     */
    public function dataset(string $name, string $type, $data)
    {
        return parent::dataset($name, $type, $data)->options([
            'fill'                => false,
            'borderWidth'         => 2,
            'lineTension'         => 0,
            'spanGaps'            => true,
            'borderColor'         => '#efefef',
            'pointRadius'         => 3,
            'pointHoverRadius'    => 7,
            'pointColor'          => '#efefef',
            'pointBackgroundColor'=> '#efefef'
        ]);
    }
}
