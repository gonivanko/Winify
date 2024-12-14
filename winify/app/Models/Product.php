<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'min_bid',
        'bid_step',
        'location',
        'condition',
        'starting_datetime',
        'ending_datetime',
        'photo'
    ];

    public function scopeFilter($query, array $filters) 
    {
        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('description', 'like', '%' . request('search') . '%')
        //         ->orWhere('location', 'like', '%' . request('search') . '%');
        // }
        if ($filters['search'] ?? false) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                      ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                      ->orWhere('location', 'like', '%' . $filters['search'] . '%');
            });
        }
        if ($filters['current_min_bid'] ?? false) {
            $query->where('current_bid', '>=', request('current_min_bid'));
        }
        if ($filters['current_max_bid'] ?? false) {
            $query->where('current_bid', '<=', request('current_max_bid'));
        }
        if ($filters['condition'] ?? false) {
            $query->where('condition', '=', request('condition'));
        }
        if ($filters['auction_status'] ?? false) {
            
            switch ($filters['auction_status']) {
                case 'on_auction':
                    $query->where('starting_date', '<=', now())->where('ending_date', '>', now());
                    break;
                case 'sold':
                    $query->where('ending_date', '<=', now());
                    break;
                case 'future_auction':
                    $query->where('starting_date', '>=', now());
                    break;
            }
            
        }
        
    }
}
