<?php

namespace App\Http\Controllers\Dean;

use App\Services\Dean\DashboardService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService) {}

    public function index() : View {
        $data = $this->dashboardService->getDashboardData();
        return view('dean.dashboard', compact('data'));
    }
}
