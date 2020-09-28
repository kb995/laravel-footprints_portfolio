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

        $trophies = $day->trophies()->orderBy('time', 'asc')->get();

        return view('index', compact('days', 'day', 'trophies'));
    }

    // DI -> Day $current_day, Trophy $trophy でテスト
    public function create(int $day, TrophyRequest $request) {
        $trophy = new Trophy();
        $trophy->trophy = $request->trophy;
        $trophy->time = $request->time;
        $trophy->date_id = $day;
        $trophy->save();

        return redirect()->route('trophies', ['day' => $day]);
    }

    // DI -> Trophy $trophy でテスト
    public function edit(int $trophy) {
        $trophy = Trophy::find($trophy);
        return view('edit', compact('trophy'));
    }

    public function update(int $trophy, TrophyRequest $request) {
        $trophy = Trophy::find($trophy);
        $trophy->trophy = $request->trophy;
        $trophy->time = $request->time;
        $trophy->save();

        return redirect()->route('trophies', ['day' => $trophy->date_id]);
    }

    public function destroy(int $trophy) {
        $trophy = Trophy::find($trophy);
        $trophy->delete();

        return redirect()->route('trophies', ['day' => $trophy->date_id]);
    }

}
