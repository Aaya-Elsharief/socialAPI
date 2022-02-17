<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $table = 'friends';
    protected $fillable = ['user_id','friend_id','created_at', 'updated_at'];
    protected $hidden = [];


############################ Start Relations ###############################


    public function users()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }


    public function posts(){
        return   $this -> hasMany(Post::class,'user_id','id');  //id is the primary key => so we can delete it
    }

############################ End Relations ###############################

}
