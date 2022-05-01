@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
        <h1>ログイン</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        @if (session('front.user_register_success') == true)
                <span style="color:green;">会員登録が完了しました。ログインしてください。</span><br>
        @endif
        <form action="/login" method="post">
            @csrf
            email：<input name="email" value="{{ old('email') }}"><br>
            password：<input  name="password" type="password"><br>
            <button class="btn btn-primary mb-3">ログイン</button>
        </form>
       
        <a href ="user/register">会員登録</a>
@endsection