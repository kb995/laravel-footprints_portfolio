@extends('layouts/layout')

@section('content')
<div class="container">
    <h1 class="text-center my-5 heading">LOGIN</h1>

    <form action="{{ route('login') }}" method="POST" class="w-50 mx-auto">
        @csrf

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
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group h5 text-right">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <small>次回から自動でログイン</small>
        </div>


        <div class="text-right mt-4">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
      </form>
</div>

@endsection
