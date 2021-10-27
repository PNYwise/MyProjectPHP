<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category','author'];
    

    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search']?? false, function($query, $search){
            return $query->where('title','like','%' . $search . '%')
                  ->orWhere('body','like','%' . $search . '%');
        })->when($filters['category']?? false, fn($query, $category)=>
            $query->whereHas('category',fn($query)=>
                $query->where('slug',$category)
            )
        )->when($filters['author']?? false, fn($query, $author)=>
            $query->whereHas('author',fn($query)=>
                $query->where('username', $author)
            )
        );
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
