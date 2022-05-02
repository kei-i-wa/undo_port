@extends('layout')
@section('contets')
    <div class="body">
        <img class="logo" src="../logo.png" width="300px" height="250px"/>
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                {{ $error }}<br>
                @endforeach
            </div>
        @endif
        @if (session('front.user_register_failure') == true)
            <span style="color:red;">会員登録が出来ませんでした。</span><br>
        @endif
        <form action="/user/register" method="post">
            @csrf
            <i class="bi bi-person-plus">　</i><input name="name" placeholder="なまえ" value="{{old('name')}}" ><br>
            <i class="bi bi-envelope">　</i><input name="email" placeholder="メールアドレス" value="{{ old('email') }}" style="margin-top:5px;"><br>
            <i class="bi bi-key-fill">　</i><input  name="password" placeholder="パスワード" type="password" style="margin-top:5px;"><br>
            <i class="bi bi-key-fill">　</i><input name="password_confirmation" placeholder="パスワード 再入力" type="password" style="margin-top:5px;"><br>
            <button class="btn btn-sm mx-auto btn-dark mb-3 mt-2" id="submit">会員登録</button>
        </form>
        <a href ="/">ログインはこちら</a>
    </div>
@endsection