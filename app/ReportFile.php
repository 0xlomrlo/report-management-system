<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportFile extends Model
{

    protected $fillable = [
        'name', 'report_id'
    ];
    public $timestamps = false;


    public function report()
    {
        return $this->hasMany('App\ReportFile');
    }
}
