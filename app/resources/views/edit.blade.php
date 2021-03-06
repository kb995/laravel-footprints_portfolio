@extends('layouts/layout')

@section('content')
<div class="container w-50">
    <h1 class="text-center my-5 heading">Edit</h1>

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
    <form action="{{ route('trophies.update', ['trophy' => $trophy]) }}" method="post" class="card text-center bg-light shadow rounded">
        @csrf
        <div class="card-header p-2 text-left">
            <span class="pl-3 heading">{{ $day->formatted_date }}</span>
        </div>
        <div class="form-group mb-0 row p-4 card-body" >
            <select name="trophy" class="form-control col-2">
                <option value="" hidden>トロフィー</option>
                <option value="0">なし</option>
                <option value="1" class="gold">Gold</option>
                <option value="2" class="silver">Silver</option>
                <option value="3" class="copper">Copper</option>
            </select>
            <input class="form-control col-6" type="text" name="text" placeholder="今日のトロフィーを記録しましょう" value="{{ $trophy->text ?? old('text') }}">
            <input class="form-control col-2" type="time" name="time" value="{{ $trophy->time ?? old('time') }}">
            <button type="submit" class="btn btn-success col-2">更新</button></button>
        </div>
    </form>

    <form action="{{ route('trophies.destroy', ['trophy' => $trophy]) }}" method="post" id="delete_{{ $trophy->id }}">
        @csrf
        <div class="text-right mt-2">
            <a class="text-danger" data-id="{{ $trophy->id }}" onclick="deletePost(this);"><i class="fas fa-trash-alt pr-1"></i>このトロフィーを削除する</a>
        </div>
    </form>
    </div>
@endsection

@section('scripts')
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除しますか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
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
