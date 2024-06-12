<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'yosra saidi',
            'email' => 'yosrrasaidi123@gmail.com',
            'password' => Hash::make('yosrasaidi'),
        ]);
    }
}
