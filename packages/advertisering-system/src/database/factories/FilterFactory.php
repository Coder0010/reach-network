<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use MostafaKamel\AdvertiseringSystem\Models\Filter;

class FilterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];
    }

    public function category()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'category',
            ];
        });
    }

    public function tag()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'tag',
            ];
        });
    }

}
