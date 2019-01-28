<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchitectUploadModel extends Model
{
      protected $fillable = [
        'name',  'type', 'extension', 'user_id', 'description', 'user_name', 'price', 'floor_plan_code', 'beds', 'baths', 'lot_size','floors','garage','depth','width','height','main_floor_area','lower_floor_area','garage_area','deck_area','roof','master_bedroom','bedrooms','lower_level_bedrooms','walk_in_closet','lower_ceiling','garage_ceiling','main_ceiling'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
