<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {

        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        return view('pages.dashboards.index');
    }
}
