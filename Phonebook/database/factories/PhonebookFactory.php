<?php

namespace Database\Factories;

use App\Models\Phonebook;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Phonebook>
 */
class PhonebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->e164PhoneNumber,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),


        ];
    }
}

// $factory->define(Phonebook::class, function (Faker $faker) {
//     return [
//         'name' => $this->faker->name(),
//         'email' =>$this->$faker->email(),
//         'phone' =>$this->$faker->e164PhoneNumber,
//         'created_at' =>$this->$faker->dateTime(),
//         'updated_at' =>$this->$faker->dateTime(),


//     ];
// });


// use App\Models\Phonebook;
// use Faker\Generator as Faker;

// $factory->define(Phonebook::class, function (Faker $faker) {
//     return [
//         'name' => $faker->unique()->name(),
//         'email' => $faker->unique()->safeEmail,
//         'phone' => $faker->e164PhoneNumber,
//         'created_at' =>$faker->dateTime(),
//         'updated_at' =>$faker->dateTime(),
//     ];
// });
