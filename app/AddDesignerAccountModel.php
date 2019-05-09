<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AddDesignerAccountModel extends Model
{
    protected $fillable = [
        'user_name', 'email', 'verification_code', 'role', 'admin_id'
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
