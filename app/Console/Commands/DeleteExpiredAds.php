<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ad;
use Carbon\Carbon;

class DeleteExpiredAds extends Command
{
   protected $signature = 'ads:delete-expired';
    protected $description = 'Delete ads that are older than the allowed time limit based on user type';

    public function handle()
    {
        // Delete ads for personal users (user_type = 1) older than 1 month
        Ad::whereHas('user', function ($query) {
            $query->where('user_type', 1);
        })
        ->where('created_at', '<', Carbon::now()->subMonth())
        ->delete();

        // Delete ads for company users (user_type = 2) older than 3 months
        Ad::whereHas('user', function ($query) {
            $query->where('user_type', 2);
        })
        ->where('created_at', '<', Carbon::now()->subMonths(3))
        ->delete();

        $this->info('Expired ads deleted successfully.');
    }
}
