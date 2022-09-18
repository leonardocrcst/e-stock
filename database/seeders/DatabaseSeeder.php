<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Log;
use App\Models\Permission;
use App\Models\Route;
use App\Models\User;
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
        Route::factory()->create();
        Account::factory()->create();
        Permission::factory()->create();
        User::factory()->create();
        Log::factory()->create();
    }
}
