<?php

namespace MostafaKamel\AdvertiseringSystem\Database\Factories;

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

    /**
     * Indicate that the model's type to be category.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function categoryType()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => Filter::CATEGORY_TYPE,
            ];
        });
    }

    /**
     * Indicate that the model's type to be tag.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function tagType()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => Filter::TAG_TYPE,
            ];
        });
    }

}
