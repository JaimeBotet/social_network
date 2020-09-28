<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'yordle_' . mt_rand(1, 99999),
            'email' => Str::random(10) . '@bandle.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$YjyKblwQXPCE.yPs.PuwRu1ZSBcj.mu3nuWrB14Uk6XBcOY5h/Jxm', //12345678
            'remember_token' => Str::random(10),
        ];
    }
}
