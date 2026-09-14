<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'multikultura@gmail.com',
        ]);

        $admin->name = 'Multikultura Admin';
        $admin->password = Hash::make('ChangeThisPassword123!');
        $admin->is_admin = true;
        $admin->email_verified_at = now();

        $admin->save();
    }
}
