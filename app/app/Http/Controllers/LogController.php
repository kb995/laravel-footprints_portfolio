<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Day;

class LogController extends Controller
{
    public function logs() {
        return view('logs');
    }
}
