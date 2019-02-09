<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOutModel extends Model
{
        protected $fillable = [
        'billing_name',  'billing_address_country', 'billing_address_country_code', 'billing_address_zip', 'billing_address_line1','user_id'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
