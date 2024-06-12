<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facture;

class FactureSeeder extends Seeder
{
    public function run()
    {
        Facture::factory()->count(10)->create();
    }
}
