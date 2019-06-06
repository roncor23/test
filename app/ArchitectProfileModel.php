<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchitectProfileModel extends Model
{
     protected $fillable = [
        'full_name',  'username', 'phone', 'address', 'address2', 'city_town', 'state_country_province', 'postcode', 'country', 'birthday', 'admin_id'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
