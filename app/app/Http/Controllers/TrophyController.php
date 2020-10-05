<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TrophyRequest;
use App\Models\Trophy;
use App\User;
use App\Models\Day;

class TrophyController extends Controller
{
    public function index() {
        $user = User::find(Auth::id());
        $day = $user->day()->first();
        $days = $user->days()->orderBy('date', 'desc')->get();

        if($day === null) {
            return view('welcome');
        }

        $trophies['gold'] = $day->gold_trophies()->orderBy('time', 'asc')->get();
        $trophies['silver'] = $day->silver_trophies()->orderBy('time', 'asc')->get();
        $trophies['copper'] = $day->copper_trophies()->orderBy('time', 'asc')->get();

        return view('index', compact('days', 'day', 'trophies'));
    }

    public function trophies(Day $day) {
        $user = User::find(Auth::id());
        $day = $user->day()->where('id', $day->id)->first();
        $days = $user->days()->orderBy('date', 'desc')->get();

        if($day === null) {
            return view('welcome');
        }

        $trophies['gold'] = $day->gold_trophies()->orderBy('time', 'asc')->get();
        $trophies['silver'] = $day->silver_trophies()->orderBy('time', 'asc')->get();
        $trophies['copper'] = $day->copper_trophies()->orderBy('time', 'asc')->get();

        return view('index', compact('days', 'day', 'trophies'));
    }

    public function store(Day $day, Trophy $trophy, TrophyRequest $request) {
        $trophy->trophy = $request->trophy;
        $trophy->text = $request->text;
        $trophy->time = $request->time;
        $trophy->date_id = $day->id;
        $trophy->save();

        return back();
    }

    public function edit(Trophy $trophy) {
        $day = Day::find($trophy->date_id);
        return view('edit', compact('day', 'trophy'));
    }

    public function update(Trophy $trophy, TrophyRequest $request) {
        $trophy->trophy = $request->trophy;
        $trophy->text = $request->text;
        $trophy->time = $request->time;
        $day = Day::find($trophy->date_id);
        $trophy->save();

        return redirect()->route('trophies', ['day' => $day]);
    }

    public function destroy(Trophy $trophy) {
        $trophy->delete();
        return back();
    }
}
