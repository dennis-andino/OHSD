<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){ // relacion entre usuarios y posts
        return $this->hasMany(Post::class,'user_id');
    }


    public function setPasswordAttribute($password){ // Encripta la contraseña recibida
        $this->attributes['password']=bcrypt($password);
    }

    public function scopeAllowed($query)
    {
        if( auth()->user()->can('read',$this) )
        {
            return $query;
        }
        return $query->where('id', auth()->id());
    }
}
