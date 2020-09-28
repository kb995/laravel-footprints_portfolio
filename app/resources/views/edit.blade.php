@extends('layouts/layout')

@section('content')
<div class="container w-50">
    <h1 class="text-center my-5 trophy-title">Edit</h1>
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

    <form action="{{ route('trophy.update', ['trophy' => $trophy]) }}" method="post" class="card text-center px-5 bg-light">
        @csrf
        <div class="form-group p-3  mb-0 row">
            <input class="form-control col-2" type="time" name="time">
            <input class="form-control col-8" type="text" name="trophy" value="{{ $trophy->trophy }}">
            <button class="btn btn-primary col-2" type="submit">編集</button>
        </div>
    </form>
    <form action="{{ route('trophy.destroy', ['trophy' => $trophy]) }}" method="post" id="delete_{{ $trophy }}">
        @csrf
        <div class="text-right">
            <a class="text-danger" href="#" data-id="{{ $trophy }}" onclick="deletePost(this);">このログを削除する</a>
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
