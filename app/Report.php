<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Report extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($report) {
            $report->{$report->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }



    public function user(){
        return $this->belongsTo('App\User');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function files(){
        return $this->hasMany('App\ReportFile');
    }


    public function scopeByUser($query, User $user)
    {
        return $query->whereHas( 'group.users' , function($q) use ($user){$q->where('user_id', $user->id);});
    }
}
