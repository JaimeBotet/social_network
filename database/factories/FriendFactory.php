<?php

namespace Database\Factories;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FriendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = mt_rand(1,5);
        $friend = mt_rand(1,5);
        while($user==$friend) {
            $friend = mt_rand(1,5);
        }
        return [
            'user_id' => $user,
            'friend_id' => $friend,
        ];
    }
}
