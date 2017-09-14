<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cr extends Model
{
    protected $fillable = ['user_id', 'cat_cr_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function catCr()
    {
    	return $this->belongsTo(CatCr::class);
    }

    public function taches()
    {
    	return $this->hasMany(Tache::class);
    }
}
