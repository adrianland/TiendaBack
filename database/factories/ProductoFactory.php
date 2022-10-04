<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' =>  $this->faker->streetName,
            'precio' => $this->faker->randomNumber(2),
            'imagen' => $this->faker->streetName,
            'stock' =>  $this->faker->randomNumber(2),
        ];
    }
}
