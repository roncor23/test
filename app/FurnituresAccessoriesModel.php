<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FurnituresAccessoriesModel extends Model
{
     protected $fillable = [
        'name', 'description', 'price', 'type', 'user_id', 'floor_plan_code','extension','user_name'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
