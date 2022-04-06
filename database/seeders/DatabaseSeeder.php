<?php

namespace Database\Seeders;

use App\Models\Printer;
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
//        create particular user
        $user = User::create([
            'name' => 'Magali',
            'email' => 'magali_90@live.nl',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => '4v2MsYLMDu',
            'has_printer' => true
        ]);

//        add particular printer to particular user
        Printer::factory([
            'user_id' => $user->id,
            'lat' => 51.035839,
            'long' => 3.725380
        ])->create();

//        create n random printers with users included
        Printer::factory(10)->create();
    }
}
