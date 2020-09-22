<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Day extends Model
{
    public function logs() {
        return $this->hasMany('App\Models\Log', 'date_id');
    }
}
