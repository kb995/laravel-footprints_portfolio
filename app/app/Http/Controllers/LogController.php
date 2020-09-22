<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LogRequest;
use App\Models\Log;
use App\User;
use App\Models\Day;

class LogController extends Controller
{
    public function logs(int $day) {
        $user = User::find(Auth::id());
        $current_day = $user->day()->where('id', $day)->first();
        $days = $user->days()->orderBy('date', 'desc')->get();
        $logs = $current_day->logs()->orderBy('time', 'asc')->get();

        return view('logs', compact('days', 'current_day', 'logs'));
    }

    public function create(int $day, LogRequest $request) {
        $log = new Log();
        $log->log = $request->log;
        $log->time = $request->time;
        $log->date_id = $day;
        $log->save();

        return redirect()->route('logs', ['day' => $day]);
    }

    public function edit(int $log) {
        $log = Log::find($log);
        return view('edit', compact('log'));
    }

    public function update(int $log, LogRequest $request) {
        $log = Log::find($log);
        $log->log = $request->log;
        $log->time = $request->time;
        $log->save();

        return redirect()->route('logs', ['day' => $log->date_id]);
}

    public function destroy(int $log) {
        $log = Log::find($log);
        $log->delete();

        return redirect()->route('logs', ['day' => $log->date_id]);
    }


}
