<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\DayRequest;
use App\Models\Day;
use App\User;

class DayController extends Controller
{
    public function create(DayRequest $request, Day $current_day) {
        $user = User::find(Auth::id());
        $current_day->date = $request->date;
        $current_day->user_id = Auth::id();
        $days = $user->days()->orderBy('date', 'desc')->get();
        $user->day()->save($current_day);

        return view('logs', compact('days', 'current_day'));
    }
}
