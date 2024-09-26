<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_name' => $this->faker->name,
            'student_email' => $this->faker->unique()->safeEmail,
            'student_birth_date' => $this->faker->date(),
            'student_mobile' => $this->faker->phoneNumber,
            'student_stream' => $this->faker->randomElement(['M.Sc.IT', 'B.Sc.IT', 'MCA', 'BCA', 'B.Voc.AC.TECH']),
            'student_address' => $this->faker->address,
            'student_gender' => $this->faker->randomElement(['female', 'male']),
            'student_hobbies' => $this->faker->randomElement(['mount_climbing', 'cycling', 'travelling', 'swimming']),

        ];
    }
}
