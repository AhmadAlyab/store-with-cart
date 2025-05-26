<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name_site' => 'الحافظ',
            'address'   => 'خان ارنبة الشارع العام',
            'phone'     => '0932867968',
        ]);
    }
}
