<?php

namespace Database\Factories;

use App\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogFactory extends Factory
{
    protected $model = Catalog::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => 0,
        ];
    }
}
