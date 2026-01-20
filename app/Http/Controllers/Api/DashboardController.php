<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DashboardStatsResource;
use App\Http\Resources\Dashboard\DashboardSummaryResource;
use App\Http\Resources\Dashboard\RecentChangesResource;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService)
    {
    }

    public function summary(): DashboardSummaryResource
    {
        return DashboardSummaryResource::make($this->dashboardService->summary());
    }

    public function recentChanges(Request $request): RecentChangesResource
    {
        $limit = (int) $request->integer('limit', 10);

        return RecentChangesResource::make([
            'data' => $this->dashboardService->recentChanges(limit: $limit),
        ]);
    }

    public function stats(): DashboardStatsResource
    {
        return DashboardStatsResource::make($this->dashboardService->stats());
    }
}
