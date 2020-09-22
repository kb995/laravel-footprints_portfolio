<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Day;
use App\User;

class DayController extends Controller
{
    public function create(Request $request) {
        $user = User::find(Auth::id());
        $current_day = new Day();
        $current_day->date = $request->date;
        $current_day->user_id = Auth::id();
        $days = $user->days()->orderBy('date', 'desc')->get();
        $user->day()->save($current_day);

        return view('logs', compact('days', 'current_day'));
    }
}
