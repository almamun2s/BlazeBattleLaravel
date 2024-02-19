<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'team_pic',
        'user_id'
    ];

    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false ) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
    }
}