<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate([], [
                'company_name' => 'Sky Tech Solve',
                'email' => 'info@skytechsolve.com',
        ]);
    }
}
