<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['text','user_id','post_id','created_at', 'updated_at'];
    protected $hidden = [];



############################ Start Relations ###############################

    public function user(){
        return   $this -> belongsTo(User::class,'user_id');
    }

    public function post(){
        return   $this -> belongsTo(Post::class,'post_id');
    }

    public function likes(){
        return   $this -> hasMany(Like::class,'type_id','id')
            ->where('type',1); //type 1 > comment
    }
############################ End Relations ###############################


}
