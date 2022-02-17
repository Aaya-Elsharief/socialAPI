<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;



    protected $table ='users';
    protected $fillable = [ 'name','email', 'password'];
    protected $hidden = ['password','remember_token'];
    protected $casts = ['email_verified_at' => 'datetime', ];




############################ Start Relations ###############################

    public function posts(){
        return   $this -> hasMany(Post::class,'user_id','id');  //id is the primary key => so we can delete it
    }

    public function comments(){
        return   $this -> hasMany(Comment::class,'user_id','id');  //id is the primary key => so we can delete it
    }

    public function likes(){
        return   $this -> hasMany(Like::class,'user_id','id');  //id is the primary key => so we can delete it
    }

 public function fav(){
        return $this->belongsToMany(Post::class,Favourite::class,"post_id","user_id");
 }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function favourite(){
        return   $this -> hasOne(Favourite::class,'user_id','id');  //id is the primary key => so we can delete it
    }


############################ End Relations ###############################



}
