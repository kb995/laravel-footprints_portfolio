<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\DayRequest;
use App\Models\Day;
use App\User;

class DayController extends Controller
{
    public function store(DayRequest $request, Day $day) {
        $user = User::find(Auth::id());
        $day->date = $request->date;
        $day->user_id = Auth::id();
        $days = $user->days()->orderBy('date', 'desc')->get();
        $user->day()->save($day);

        return redirect()->route('trophies', ['day' => $day]);
    }
}
