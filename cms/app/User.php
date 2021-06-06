<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Userinfo;
use Post;
use Illuminate\Http\Request;


class User extends Authenticatable
{
    use Notifiable;
    
    //このユーザがフォローしている人を取得
public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

//このユーザをフォローしている人を取得
public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow_each(){
        //ユーザがフォロー中のユーザを取得
        $userIds = $this->followings()->pluck('users.id')->toArray();
       //相互フォロー中のユーザを取得
        $follow_each = $this->followers()->whereIn('users.id', $userIds)->pluck('users.id')->toArray();
       //相互フォロー中のユーザを返す
        return $follow_each;
    }
     public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function follow($userId)
    {
        // すでにフォロー済みではないか？
        $existing = $this->is_following($userId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $this->id == $userId;
    
        // フォロー済みではない、かつフォロー相手がユーザ自身ではない場合、フォロー
        if (!$existing && !$myself) {
            $this->followings()->attach($userId);
        }
    }
    
    public function unfollow($userId)
    {
        // すでにフォロー済みではないか？
        $existing = $this->is_following($userId);
        // フォローを外す相手がユーザ自身ではないか？
        $myself = $this->id == $userId;
    
        // すでにフォロー済み、かつフォロー相手がユーザ自身ではない場合、フォローを外す
        if ($existing && !$myself) {
            $this->followings()->detach($userId);
        }
    }
    
    
    
    public function posts() {
        return $this->hasMany('App\Post');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
