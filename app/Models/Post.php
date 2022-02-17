<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['text','user_id','created_at', 'updated_at'];
    protected $hidden = [];




############################ Start Relations ###############################

    public function user(){
        return   $this -> belongsTo(User::class,'user_id');
    }


    public function friend(){
        return   $this -> belongsTo(Friend::class,'user_id');
    }

    public function comments(){
        return   $this -> hasMany(Comment::class,'post_id','id');  //id is the primary key => so we can delete it
    }

    public function likes(){
        return   $this -> hasMany(Like::class,'type_id','id')
            ->where('type',0); //type 0 > post
    }


############################ End Relations ###############################


}
