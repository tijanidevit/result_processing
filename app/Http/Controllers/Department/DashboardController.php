<?php

namespace App\Http\Controllers\Department;

use App\Services\Department\DashboardService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService) {}

    public function index() : View {
        $data = $this->dashboardService->getDashboardData();
        return view('department.dashboard', compact('data'));
    }
}
