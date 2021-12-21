<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Thread::class;


    public function definition()
    {
        return [
            'user_id'       => User::factory(),
            'category_id'   => rand(1,5),
            'title'         => $name = Str::title($this->faker->sentence()),
            'slug'          => Str::slug($name .'-'. Str::random(6)),
            'body'          => $this->faker->paragraph()
        ];
    }
}
