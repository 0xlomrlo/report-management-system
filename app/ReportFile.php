<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportFile extends Model
{
    public function report(){
        return $this->hasMany('App\ReportFile');
    }
}
