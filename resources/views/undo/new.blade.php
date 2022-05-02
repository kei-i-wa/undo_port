@extends('layout')
@section('contets')
    <div class="body">
        <img class="logo" src="../title.png" width="300px" height="50px"/>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        @if (session('front.undo_register_failure') == true)
            <p style="color:red;">※投稿処理失敗</p>
        @endif
        <!--新規投稿画面-->
        <form action="/undo/register" method="post">
        @csrf
        <table style="width:70%;">
            <tr>
                <th class="form-title"><i class="bi bi-pencil">メニュー　</i></th>
                <td class="form-item"><input name="menu" value="{{ old('menu') }}" maxlength="12" required="true" placeholder="散歩"></td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-alarm-fill">所要時間　</i></th>
                 <td class="form-item"><input name="minutes" value="{{ old('minutes') }}" size="8" maxlength="3" required="true" placeholder="30">分</td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-heart-pulse">運動強度　</i></th>
                 <td class="form-item">
                    <select name="level">
                    <option value="3" @if (old('level') == 3) selected @endif>高（会話が出来ない）</option>
                    <option value="2" @if (old('level',2) == 2) selected @endif>中（息が上がる）</option>
                    <option value="1" @if (old('level') == 1) selected @endif>軽</option>
                    </select>
                 </td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-flag-fill">目的　　　</i></th>
                 <td class="form-item"><input name="target" value="{{ old('target') }}" maxlength="17" placeholder="運動不足解消"></td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-chat-square-quote">その他　　</i></th>
                 <td class="form-item"><textarea name="detail" value="{{ old('detail') }}" cols="30" rows="5" placeholder="太ももの筋肉を動かすことを意識すると効果的"></textarea></td>
             </tr>
             <tr>
                 <th class="form-title"></th>
                 <td class="form-item"><button class="btn btn-sm mx-auto btn-primary mb-3" id="submit">今日の運動を登録</button></td>
             </tr>
        </table>
        </form>
        <!--Footerリンク-->
        <menu label="リンク" id="footer-fix">
            <ul id="footer-fix-menu">
                <li><a href="/logout"><i class="bi bi-door-open-fill">ログアウト</i></a></li>
                <li><a href="/undo/mylist"><i class="bi bi-person-fill">マイページ</i></a></li>
                <li><a href="/undo/list"><i class="bi bi-house-door">投稿一覧</i></a></li>
                <li><a href="/undo/new"><i class="bi bi-pencil-fill">新規投稿</i></a></li>
            </ul>
        </menu>
    </div>
@endsection