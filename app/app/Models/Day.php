<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Day extends Model
{
    public function trophies() {
        return $this->hasMany('App\Models\Trophies', 'date_id');
    }
}
