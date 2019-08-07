<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionModel extends Model
{
      protected $fillable = [
        'first_name', 'last_name', 'email', 'select', 'question'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
