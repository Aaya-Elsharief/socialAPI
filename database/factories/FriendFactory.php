<?php

namespace Database\Factories;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    { $user_id =User::all()->random()->id;
        return [
            'user_id' =>$user_id ,
            'friend_id'=> User::all()->except($user_id)->random()->id,
        ];
    }
}
