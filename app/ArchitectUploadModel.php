<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchitectUploadModel extends Model
{
      protected $fillable = [
        'name',  'type', 'extension', 'user_id', 'description', 'user_name', 'price', 'floor_plan_code', 'beds', 'baths', 'lot_area_width','lot_area_length','floor_area_width','floor_area_length','floor_area_height','ground_floor','second_floor','third_floor','features'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
