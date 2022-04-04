<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalOrder extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $data = ['created_at'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
    public function wastecollector()
    {
        return $this->belongsTo(User::class, 'waste_collector_id');
    }
    public function detail()
    {
        return $this->hasMany(FinalOrderDetail::class, 'order_code', 'order_code');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'order_code', 'order_code');
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query->whereHas('user', fn ($query) => $query->where('full_name', 'like', '%' .  $search . '%')->orWhere('email', $search))
                ->orWhereHas('driver', fn ($query) => $query->where('full_name', $search)->orWhere('email', $search))
                ->orWhere('order_code', $search)
        )->when(
            $filters['type'] ?? false,
            fn ($query, $type) => $query->whereHas('detail', fn ($query) => $query->where('waste_type', $type))
        )->when(
            $filters['start_date'] ?? false,
            fn ($query, $start_date) => $query->whereDate('created_at', '>=', $start_date)
        )->when(
            $filters['finish_date'] ?? false,
            fn ($query, $finish_date) => $query->whereDate('created_at', '<=', $finish_date)
        );
    }
}
