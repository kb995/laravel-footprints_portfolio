@extends('layouts/layout')

@section('styles')
    {{--  @include('libs.flatpickr.styles')  --}}
@endsection

@section('content')
<section class="container">
    <h1 class="text-center my-5 log-title">Logs</h1>

    {{--  エラー表示  --}}
    {{--  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  --}}

    {{--  行動ログフォーム  --}}
    {{--  <form action="{{ route('log.create', ['day' => $current_day]) }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-3" type="time" name="time">
            <input class="form-control col-7" type="text" name="log" placeholder="行動ログを記録しましょう">
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>  --}}

    {{--  行動ログ一覧  --}}
    <table class="card text-left p-4 bg-dark log-scroll">
        <div id="log-inner">
            @isset($current_day)
            <tr class="mb-0 log-link">
                <td>======== </td>
                    <td>{{ $current_day->date }}</td>
                <td> =========================</td>
            </tr>
            @endisset

            @empty($current_day)
            <tr class="mb-0 log-link">
                <td>======== </td>
                <td>新しい日を登録しましょう</td>
                <td> =========================</td>
            </tr>
            @endempty

            @isset($logs)
            @foreach($logs as $log)
            <tr class="mb-0 log-link">
                <td>
                    @isset($log->time)
                    [{{ substr($log->time, 0, 5) }}]
                    @endisset
                </td>
                <td class="pl-2">
                    {{--  <a class="log-link" href="{{ route('log.edit', ['log' => $log]) }}">  --}}
                        {{ $log->log }}
                    {{--  </a>  --}}
                </td>
            </tr>
            @endforeach
            @endisset
        </div>
    </table>

    {{--  日付の選択/追加  --}}
    {{--  <form action="{{ route('day.create') }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input type="text" class="form-control col-9" name="date" id="date" value="{{ date('Y/m/d') }}" />
            <button type="submit" class="btn btn-primary col-2">追加</button>
        </div>
    </form>  --}}

    {{--  <div class="mt-4">
        日付一覧
        @isset($days)
            @foreach($days as $day)
            <p>
                <a href="{{ route('logs', ['day' => $day]) }}">
                    {{ $day->date }}
                </a>
            </p>
            @endforeach
        @endisset
    </div>  --}}
</section>
@endsection

{{--  @section('scripts')
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
    flatpickr(document.getElementById('date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
    </script>
@endsection  --}}
