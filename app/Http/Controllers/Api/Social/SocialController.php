<?php

namespace App\Http\Controllers\Api\Social;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavouriteResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class SocialController extends Controller
{
    use GeneralTrait;

    public function user(){
        $user = Auth::guard('api')->user();
        return $this->returnData('user',$user,'This is user data');
    }

    public function profile($user_id = null){
        //all posts for the user requested
        if(isset($user_id)){
            $user =  User::with('posts')->find($user_id);
            return $this->returnData('User',$user,'User Profile');
        }
        $user = Auth::guard('api') -> user();
       return $this->returnData('User',$user);
    }

    public function timeline(){

        $user = Auth::guard('api') -> user();
        if($user){
            //all posts for all users
            $posts =  Post::with(['user'=>function($q){
                $q-> select('name','id','created_at');
            }])->select('text','user_id','id')->get();
            return $this->returnData('Post',$posts);
        }

        $user = Auth::guard('api') -> user();
        return $this->returnData('User',$user);

    }

    public function postPage($post_id = null){

          $post = Post::with(['user','comments','likes'])->find($post_id);
            return $this->returnData('Post',$post);
    }

    public function userFriends($user_id = null){
        if(isset($user_id)){
            $user = User::with('friends')->find($user_id);
            return $this->returnData('User',$user,'User Friends');
        }
        $user = Auth::guard('api') -> user();
        return $this->returnData('User',$user);
    }


    public function userFavouritePost($user_id = null)
    {
        if (isset($user_id)) {
                 $user = User::with(['fav' => function ($q) {
                     $q->with('post');
                 }
                 ])->find($user_id);
                // return $this->returnData('User', $user);
            return new FavouriteResource($user);
             }
                 $user = Auth::guard('api') -> user();
                return new FavouriteResource($user);
        }


    public function userHome($user_id = null){
/*
        if(isset($user_id)) {

            $friends = Friend::with(['users' => function ($q) {
                $q->with('posts');
            }
            ])->where('user_id', '=', $user_id)->get();
            return $this->returnData('HomeUser', $friends);
        }
        $user = Auth::guard('api') -> user()->id;
        return $this->returnData('User',$user);

*/

        //all posts for all users
        $posts =  Post::with(['user'=>function($q){
            $q-> select('name','id','created_at');
        }
                            ,'comments'=>function($q){
                $q-> select('text','id','user_id','post_id')->paginate(1);;
            }
            ,'likes'=>function($q){
                $q-> select('id','user_id','type_id')->paginate(1);;
            },

            ])->select('text','user_id','id')->paginate(2);
        return $this->returnData('Post',$posts);

    }

}
