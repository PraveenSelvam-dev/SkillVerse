<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        $chartsData = [];
        return view('admin.reports.index', compact('chartsData'));
    }

    public function analytics()
    {
        $analyticsData = [];
        return view('admin.analytics.index', compact('analyticsData'));
    }
}
