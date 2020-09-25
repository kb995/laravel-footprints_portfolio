@extends('layouts/layout')

@section('styles')
    @include('libs.flatpickr.styles')
@endsection

@section('content')
<section class="container">
    <div class="w-50 mx-auto">
    <h1 class="text-center my-5 log-title">Logs</h1>

    {{--  エラー表示  --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{--  行動ログフォーム  --}}
    <form action="{{ route('log.create', ['day' => $current_day]) }}" method="post" class="card text-center px-5 my-5 bg-light shadow rounded">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-2" type="time" name="time">
            <input class="form-control col-8" type="text" name="log" placeholder="積み上げを記録しましょう">
            <button type="submit" class="btn btn-success col-2">追加</button>
        </div>
    </form>


    {{--  日付移動 /　作成  --}}
    <div class="pl-4 border">
        <form action="{{ route('day.create') }}" method="post" class="mt-2">
            @csrf
            <label for="" class="date-text">Days</label>
            @isset($days)
            <select onChange="location.href=value;" class="mr-5">
                @foreach($days as $day)
                    <option value="{{ route('logs', ['day' => $day]) }}">
                        {{ $day->date }}
                    </option>
                @endforeach
            </select>
            @endisset

            <label for="" class="date-text">New Day</label>
            <input type="text" name="date" id="date" value="{{ date('Y/m/d') }}" />
            <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i></i></button>
        </form>
    </div>


    {{--  行動ログ一覧  --}}
    <table class="card text-left p-4 bg-dark log-scroll">
        <div id="log-inner">
            @empty($current_day)
                <tr>
                    <td class="log-link">新しい日をはじめましょう</td>
                </tr>
            @endempty

            @isset($logs)
            @foreach($logs as $log)
            <tr class="log-link border-bottom">
                <td class="pl-2">
                    <a class="log-link" href="{{ route('log.edit', ['log' => $log]) }}">
                        {{ $log->log }}
                    </a>
                </td>
                <td>
                    @isset($log->time)
                    [{{ substr($log->time, 0, 5) }}]
                    @endisset
                </td>
            </tr>
            @endforeach
            @endisset
        </div>
    </table>
</div>
</section>

@endsection

@section('scripts')
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
    flatpickr(document.getElementById('date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
    </script>
@endsection
