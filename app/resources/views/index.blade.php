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

        {{--  トロフィーフォーム  --}}
        <form action="{{ route('trophies.store', ['day' => $day]) }}" method="post" class="card text-center px-5 my-5 bg-light shadow rounded">
            @csrf
            <div class="form-group mb-0 row p-3" >
                <select name="trophy" class="form-control col-2">
                    <option value="" hidden>トロフィー</option>
                    <option value="0">なし</option>
                    <option value="1" class="gold">Gold</option>
                    <option value="2" class="silver">Silver</option>
                    <option value="3" class="copper">Copper</option>
                </select>
                <input class="form-control col-6" type="text" name="text" placeholder="今日のトロフィーを記録しましょう">
                <input class="form-control col-2" type="time" name="time">
                <button type="submit" class="btn btn-success col-2">追加</button>
            </div>
        </form>

        {{--  日付  --}}
        <div class="pl-4 border">
            <form action="{{ route('days.store') }}" method="post" class="m-3 d-flex justify-content-end">
                <span class="mr-auto my-auto h4">{{ $day->formatted_date }}</span>
                @csrf
                <label for="" class="date-text pr-3 my-auto">Days</label>
                @isset($days)
                    <select onChange="location.href=value;" class="mr-4">
                        @foreach($days as $day_list)
                            @if ($loop->first)
                            <option selected>
                                日付選択
                            </option>
                            @endif
                            <option value="{{ route('trophies', ['day' => $day_list]) }}">
                                {{ $day_list->date }}
                            </option>
                        @endforeach
                    </select>
                @endisset
                <label for="" class="date-text pr-2 my-auto">New</label>
                <input class="pl-2" type="text" name="date" id="date" value="{{ date('Y/m/d') }}" />
                <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i></i></button>
            </form>
        </div>

        {{--  トロフィー一覧  --}}
        <table class="card text-left p-4 pl-5 bg-dark trophy-scroll">
            <div id="trophy-inner">
                @isset($trophies)
                    {{--  ゴールド  --}}
                    @foreach($trophies['gold'] as $trophy)
                        <tr class="d-flex justify-content-between">
                            <td class="pl-2">
                                <a class="trophy-text_gold" href="{{ route('trophies.edit', ['trophy' => $trophy]) }}">
                                    <i class="fas fa-trophy gold pr-2"></i>  {{ $trophy->text }}
                                </a>
                                <span class="time pl-2">
                                    @isset($trophy->time)
                                    [{{ substr($trophy->time, 0, 5) }}]
                                    @endisset
                                </span>
                            </td>
                        </tr>
                        @if ($loop->last)
                            <tr><td class="w-100 py-2"></td></tr>
                        @endif

                    @endforeach
                    {{--  シルバー  --}}
                    @foreach($trophies['silver'] as $trophy)
                        <tr>
                            <td class="pl-2">
                                <a class="trophy-text_silver" href="{{ route('trophies.edit', ['trophy' => $trophy]) }}">
                                    <i class="fas fa-trophy silver pr-2"></i>  {{ $trophy->text }}
                                </a>
                                <span class="time pl-2">
                                    @isset($trophy->time)
                                    [{{ substr($trophy->time, 0, 5) }}]
                                    @endisset
                                </span>
                            </td>
                        </tr>
                    @if ($loop->last)
                        <tr><td class="w-100 py-2"></td></tr>
                    @endif

                    @endforeach
                    {{--  カッパー  --}}
                    @foreach($trophies['copper'] as $trophy)
                        <tr>
                            <td class="pl-2">
                                <a class="trophy-text_copper" href="{{ route('trophies.edit', ['trophy' => $trophy]) }}">
                                    <i class="fas fa-trophy copper pr-2"></i>  {{ $trophy->text }}
                                </a>
                                <span class="time pl-2">
                                    @isset($trophy->time)
                                    [{{ substr($trophy->time, 0, 5) }}]
                                    @endisset
                                </span>
                            </td>
                        </tr>
                    @endforeach
                @endisset
                {{--  @empty($trophies)
                    <tr>
                        <td class="trophy-text_copper">
                            何も登録されていません
                        </td>
                    </tr>
                @endempty  --}}
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
