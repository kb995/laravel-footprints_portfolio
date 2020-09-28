@extends('layouts/layout')

@section('styles')
    @include('libs.flatpickr.styles')
@endsection

@section('content')
<section class="container">
    <div class="content mx-auto">
        <h1 class="text-center my-5">Trophy</h1>

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
        <form action="{{ route('trophy.create', ['day' => $day]) }}" method="post" class="card text-center px-5 my-5 bg-light shadow rounded">
            @csrf
            <div class="form-group mb-0 row p-3">
                <select name="trophy" class="form-control col-2" id="">
                    <option value="1">なし</option>
                    <option value="2"><i class="fas fa-trophy"></i></option>
                    <option value="3"><i class="fas fa-trophy"></i></option>
                    <option value="4"><i class="fas fa-trophy"></i></option>
                </select>
                <input class="form-control col-6" type="text" name="text" placeholder="今日のトロフィーを記録しましょう">
                <input class="form-control col-2" type="time" name="time">
                <button type="submit" class="btn btn-success col-2">追加</button>
            </div>
        </form>


        {{--  日付移動 /　作成  --}}
        <div class="pl-4 border">
            <form action="{{ route('day.create') }}" method="post" class="mt-2">
                @csrf
                <label for="" class="date-text pr-1">Days</label>
                @isset($days)
                <select onChange="location.href=value;" class="mr-5">
                    @foreach($days as $day)
                        <option value="{{ route('index', ['day' => $day]) }}">
                            {{ $day->date }}
                        </option>
                    @endforeach
                </select>
                @endisset

                <label for="" class="date-text pr-1 ">New</label>
                <input class="pl-2" type="text" name="date" id="date" value="{{ date('Y/m/d') }}" />
                <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i></i></button>
            </form>
        </div>


        {{--  行動ログ一覧  --}}
        <table class="card text-left p-4 bg-dark trophy-scroll">
            <div id="trophy-inner">
                @isset($trophies)
                @foreach($trophies as $trophy)
                <tr class="trophy-link">
                    <td class="pl-2">
                        <a class="trophy-link" href="{{ route('trophy.edit', ['trophy' => $trophy]) }}">
                            <i class="fas fa-trophy"></i> : {{ $trophy->text }}
                        </a>
                    </td>
                    <td>
                        @isset($trophy->time)
                        <small>
                            [{{ substr($trophy->time, 0, 5) }}]
                        </small>
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
