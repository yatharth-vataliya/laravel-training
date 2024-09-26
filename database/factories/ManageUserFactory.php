<?php

namespace Database\Factories;

use App\Models\ManageUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManageUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ManageUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['female', 'male'];

        return [
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->unique()->safeEmail,
            'user_address' => $this->faker->address,
            'user_mobile' => $this->faker->phoneNumber,
            'gender' => $gender[random_int(0, 1)],
            'date' => $this->faker->date(),
        ];
    }
}
