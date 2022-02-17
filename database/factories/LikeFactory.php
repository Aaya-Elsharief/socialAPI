<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { $type = random_int(0,1);  //if 0>post , 1>comment
        if($type == 0)
            $type_id =  Post::all()->random()->id;
        else
            $type_id = Comment::all()->random()->id;

        return [
            'user_id' => User::all()->random()->id,
            'type'=> $type,
            'type_id'=>$type_id,
            'like'=> random_int(0,1), //if 0>unlike , 1>like

        ];
    }
}
