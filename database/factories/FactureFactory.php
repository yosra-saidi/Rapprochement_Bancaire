<?php

namespace Database\Factories;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    protected $model = Facture::class;

    public function definition()
    {
        return [
            'numero_facture' => $this->faker->unique()->numerify('FAC###'),
            'montant' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
