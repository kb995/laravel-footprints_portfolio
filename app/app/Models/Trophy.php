<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    public function day() {
        return $this->hasOne('App\Models\Day', 'id');
    }
}
