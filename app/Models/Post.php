<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

 
    // protected $guarded = [];

    protected $fillable = ['slug','title','excerpt','image','body'];

    //  Eloquent Relationships : hasOne, hasMany, belongsTo, belongsToMany
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query
            ->where('title','like','%'.request('search').'%')
            ->orwhere('excerpt','like','%'.request('search').'%')
            ->orwhere('body','like','%'.request('search').'%');
        }
    }
}
