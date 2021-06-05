<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $rdm = rand(0,1000000);
        return [
            // 'title' => '打掃家裡',
            // 'salary' => $rdm,
            // 'desc' => "幫忙掃個地 $rdm 分鐘",
            // 'enabled' => true
            'title' => $this->faker->realText(15),
            'salary' => rand(0,1000000),
            'desc' => $this->faker->realText,
            'enabled' => $this->faker->randomElement(array(true,false))
        ];
    }
}
