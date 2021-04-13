<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'category_id',
        'excerpt',
        'user_id',
        'visible'
    ];

    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        $query->latest('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->where('visible',1);
    }

    public function scopeAllowed($query)
    {
        if( auth()->user()->can('read_post',$this) )
        {

            return $query->where('visible',1);
        }
        return $query->where('user_id', auth()->id());
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function autor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : Carbon::now();
    }
}
