<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $prefecture = $this->faker->prefecture();
        $city = $this->faker->city();
        $streetAddress = $this->faker->streetAddress();

        $fullAddress = $prefecture . $city . $streetAddress;

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement([0, 1, 2]),
            'email' => $this->faker->email(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $fullAddress,
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->realText(120),
            'created_at' => $this->faker->dateTimeBetween('-6 month', 'now'),
            'updated_at' => now(),
        ];
    }
}
