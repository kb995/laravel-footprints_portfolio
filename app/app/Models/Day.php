<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Day extends Model
{

    public function all_trophies() {
        return $this->hasMany('App\Models\Trophy', 'date_id');
    }
    public function gold_trophies() {
        return $this->hasMany('App\Models\Trophy', 'date_id')->where('trophy', 1);
    }
    public function silver_trophies() {
        return $this->hasMany('App\Models\Trophy', 'date_id')->where('trophy', 2);
    }
    public function copper_trophies() {
        return $this->hasMany('App\Models\Trophy', 'date_id')->where('trophy', 3);
    }

    public function getFormattedDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date'])
            ->format('Y/m/d');
    }
}
