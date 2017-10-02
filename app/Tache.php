<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = ['title', 'date', 'completed', 'sended', 'user_id', 'cr_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function email()
    {
    	return $this->belongsTo(Email::class);
    }
}
