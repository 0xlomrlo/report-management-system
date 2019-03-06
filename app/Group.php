<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function report()
    {
        return $this->hasMany('App\Report');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
