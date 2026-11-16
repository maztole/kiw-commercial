<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kiw.co.id'],
            [
                'name' => 'Admin Marketing KIW',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->call([
            KiwCommercialSeeder::class,
        ]);
    }
}
