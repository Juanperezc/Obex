<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function project()
    {
        return view('reports/project');
    }
    public function team()
    {
        return view('reports/team');
    }
    public function project_detail()
    {
        return view('reports/project-detail/index');
    }

}
