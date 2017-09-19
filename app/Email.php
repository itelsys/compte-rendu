<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['user_id', 'content'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function taches()
    {
    	return $this->hasMany(Tache::class);
    }
}
