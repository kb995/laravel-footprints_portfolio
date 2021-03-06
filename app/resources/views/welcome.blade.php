@extends('layouts/layout')

@section('styles')
    @include('libs.flatpickr.styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endsection

@section('content')
<section class="container">
    <div class="w-50 mx-auto">
    <h1 class="text-center my-5 heading">WELLCOME</h1>
    
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

    {{--  日付移動 /　作成  --}}
    <div class="pl-4 border">
        <form action="{{ route('days.store') }}" method="post" class="mt-2 text-center py-2">
            @csrf
            <label for="" class="heading">NEW</label>
            <input type="text" name="date" id="date" value="{{ date('Y/m/d') }}" />
            <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i></i></button>
        </form>
    </div>


    {{--  行動ログ一覧  --}}
    <table class="card text-left p-4 bg-dark log-scroll">
        <div id="log-inner">
                <tr>
                    <td class="log-link">新しい日をはじめましょう</td>
                </tr>
        </div>
    </table>
</div>
</section>

@endsection

@section('scripts')
    {{--  flatpickr  --}}
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
    flatpickr(document.getElementById('date'), {
        locale: 'ja',
        dateFormat: "Y/m/d",
        minDate: new Date()
    });
    </script>

    {{--  toaster  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session('flash_message'))
            $(function () {
                    toastr.success('{{ session('flash_message') }}');
            });
        @endif
        @if (session('msg_danger'))
            $(function () {
                toastr.danger('{{ session('msg_danger') }}');
            });
        @endif
    </script>

@endsection
