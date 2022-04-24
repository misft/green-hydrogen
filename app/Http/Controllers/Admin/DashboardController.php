<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->year;
        
        $analyticsData = Analytics::performQuery(
            Period::months(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:bounceRate, ga:sessionDuration',
                'dimensions' => 'ga:month, ga:year, ga:country',
                'sort' => '-ga:sessions'
            ]
        );

        $analyticsDataAll = $analyticsData['rows'];
        
        $analyticsDataAll = array_map(function($data) {
            return array(
                'month' => $data[0],
                'year' => $data[1],
                'country' => $data[2],
                'visitor' => $data[3],
                'bounchRate' => $data[4],
                'duration' => (int)$data[5]/60
            );
        }, $analyticsDataAll);

        // Visitor
        $analyticsDataVisitor = Analytics::performQuery(
            Period::months(1),
            'ga:sessions',
            [
                'dimensions' => 'ga:month, ga:year',
            ]
        );

        $dataVisitor = [];

        for ($i=0; $i < 12; $i++) { 
            foreach ($analyticsDataVisitor as $data) {
                $dataVisitor[$i] = 0;

                if ((int)$data[0] - 1 == $i && $data[1] == $date) {
                    $dataVisitor[$i] = (int)$data[2];
                }
            }
        }

        // Bounce Rate
        $analyticsDataBounceRate = Analytics::performQuery(
            Period::months(1),
            'ga:bounceRate',
            [
                'dimensions' => 'ga:month, ga:year',
            ]
        );

        $dataBounceRate = [];

        for ($i=0; $i < 12; $i++) { 
            foreach ($analyticsDataBounceRate as $data) {
                $dataBounceRate[$i] = 0;

                if ((int)$data[0] - 1 == $i && $data[1] == $date) {
                    $dataBounceRate[$i] = (float)$data[2];
                }
            }
        }

        return view('admin.dashboard.index', ['analyticsDataAll' => $analyticsDataAll, 'dataBounceRate' => $dataBounceRate, 'dataVisitor' => $dataVisitor]);
    }
}
