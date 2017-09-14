<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = ['title', 'completed', 'user_id', 'cr_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function cr()
    {
    	return $this->belongsTo(Cr::class);
    }
}
