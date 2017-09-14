<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatCr extends Model
{
    protected $fillable = ['name'];

    public function crs()
    {
    	return $this->hasMany(Cr::class);
    }
}
