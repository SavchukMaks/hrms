<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function countCandidate()
    {
        $candidates= DB::table('candidates')->whereDate('created_at', '=', Carbon::now()->toDateString())
            ->distinct('last_name')
            ->count('last_name');

        return $candidates;
    }
}