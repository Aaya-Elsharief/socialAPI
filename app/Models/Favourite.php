<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $table = 'favourites';
    protected $fillable = ['user_id','post_id','created_at', 'updated_at'];
    protected $hidden = [];


############################ Start Relations ###############################

    public function user(){
        return   $this -> belongsTo(User::class,'user_id');
    }


    public function post(){
        return   $this -> belongsTo(Post::class,'post_id');
    }

############################ End Relations ###############################

}
