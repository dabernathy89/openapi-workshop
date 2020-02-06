<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }

    public function contestants()
    {
        return $this->hasMany(Contestant::class);
    }
}
