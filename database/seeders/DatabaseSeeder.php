<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ad;
use App\Models\User;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\LastAdSee;
use App\Models\Notification;
use App\Models\CountOfViewAd;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);

    }
}
