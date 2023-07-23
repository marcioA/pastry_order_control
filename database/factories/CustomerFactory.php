<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'birthday' => $this->faker->date,
            'address' => $this->faker->streetAddress(),
            'complement' => $this->faker->sentence('2'),
            'district' => $this->faker->city(),
            'zipcode' => $this->faker->postcode(),
            'dt_register' => $this->faker->date,
        ];
    }
}
