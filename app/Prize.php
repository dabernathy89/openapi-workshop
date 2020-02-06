<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }

    public function contestant()
    {
        return $this->belongsTo(Contestant::class);
    }
}
