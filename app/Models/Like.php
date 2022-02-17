<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = ['user_id','type','type_id', 'likes'];
    protected $hidden = [];

############################ Start Relations ###############################

    public function user(){
        return   $this -> belongsTo(User::class,'user_id');
    }


    public function post(){
        return   $this -> belongsTo(Post::class,'type_id','id')
            ->where('type',0); //type 0 > post
    }


    public function comment(){
        return   $this -> belongsTo(Comment::class,'type_id','id')
            ->where('type',1); //type 1 > comment
    }
############################ End Relations ###############################


}
