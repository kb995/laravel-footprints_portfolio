<?php

namespace App\Models;

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
}
