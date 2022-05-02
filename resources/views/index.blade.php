@extends('layout')
{{-- メインコンテンツ --}}
@section('contets')
        <div class="body">
            <img class="logo" src="logo.png" width="300px" height="250px"/>
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            @if (session('front.user_register_success') == true)
                <p style="color:green;">会員登録が完了しました。<br>ログインしてください。</p>
            @endif
            <form action="/login" method="post">
                @csrf
                <i class="bi bi-envelope">　</i><input name="email" placeholder="メールアドレス" value="{{ old('email') }}"><br>
                <i class="bi bi-key-fill">　</i><input  name="password" type="password" style="margin-top:5px;" placeholder="パスワード"><br>
                <button class="btn btn-sm mx-auto btn-dark mb-3 mt-2" id="submit">ログイン</button>
            </form>
            <a href ="user/register">会員登録はこちら</a>
        </div>
@endsection