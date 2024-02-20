<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'team_pic',
        'user_id',
        'team_position'
    ];

    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false ) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
    }


    // Relation to  User
    public function user(){
        return $this->hasMany(User::class, 'teams_id');
    }
}
