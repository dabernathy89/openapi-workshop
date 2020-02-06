<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function prize()
    {
        return $this->hasOne(Prize::class);
    }
}
