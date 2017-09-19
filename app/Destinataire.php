<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
    protected $fillable = ['user_id', 'cr_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function email()
    {
    	return $this->belongsTo(Email::class);
    }
}
