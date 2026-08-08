<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class WalletSeeder extends Seeder
{
    public function run()
    {
        $users = User::whereIn('role', ['instructor', 'mentor', 'freelancer'])->get();

        foreach ($users as $user) {
            $balance = 0;
            $earned = 0;
            if ($user->role == 'instructor') {
                $balance = rand(500, 5000);
                $earned = rand(2000, 15000);
            } elseif ($user->role == 'mentor') {
                $balance = rand(300, 3000);
                $earned = rand(1000, 8000);
            } elseif ($user->role == 'freelancer') {
                $balance = rand(400, 4000);
                $earned = rand(1500, 10000);
            }

            DB::table('wallets')->insert([
                'user_id' => $user->id,
                'balance' => $balance,
                'total_earned' => $earned,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
