<?php

namespace MostafaKamel\AdvertiseringSystem\Database\Factories;

use App\Models\User;
use MostafaKamel\AdvertiseringSystem\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;
use MostafaKamel\AdvertiseringSystem\Models\Filter;

class AdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ad::class;

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
            'category_id' => Filter::factory()->categoryType(),
            'user_id'     => User::factory(),
            'start_date'  => \Carbon\Carbon::today()->addDays(rand(1,4))
        ];
    }

    /**
     * Indicate that the model's status to be free.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function freeStatus()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Ad::FREE,
            ];
        });
    }

    /**
     * Indicate that the model's status to be paid.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function paidStatus()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Ad::PAID,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Ad $entity) {
            $entity->tags()->sync(Filter::factory(2)->tagType()->create());
        });
    }
}
