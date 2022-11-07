<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    // public function scopeFilter($query, array $filters)
    // {
    //     $query->when($filters['pickup'] ?? false, function ($query, $search) {
    //         return $query->where('title');
    //     });

    //     // $query->when($filters['pickup'] ?? false, function ($query, $category) {
    //     //     return $query->whereHas('category', function ($query) use ($category) {
    //     //         $query->where('slug', $category);
    //     //     });
    //     // });

    //     // $query->when($filters['author'] ?? false, function ($query, $author) {
    //     //     return $query->whereHas('user', function ($query) use ($author) {
    //     //         $query->where('username', $author);
    //     //     });
    //     // });
    // }
}
