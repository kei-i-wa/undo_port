@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>運動の登録</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        @if (session('front.undo_register_success') == true)
                <span style="color:green;">Success!</span><br>
            @endif
            <form action="/undo/register" method="post">
                @csrf
                <label>メニュー名</label><br>
                <input name="menu" value="{{ old('menu') }}" maxlength="40" required="true" placeholder="近所を散歩！"><br>
                <label>所要時間</label><br>
                <input name="minutes" value="{{ old('minutes') }}" size="5" maxlength="3" required="true">分<br>
                <label>運動強度</label><br>
                <select name="level">
                    <option value="3" @if (old('level') == 3) selected @endif>高（会話が出来ない）</option>
                    <option value="2" @if (old('level',2) == 2) checked @endif>中（息が上がる）</option>
                    <option value="1" @if (old('level') == 1) selected @endif>軽</option>
                </select><br>
                <label>目的</label><br>
                <input name="target" value="{{ old('target') }}" placeholder="例：運動不足解消"><br>
                <label>その他詳細（あれば）</label><br>
                <textarea name="detail" value="{{ old('detail') }}"cols="50" rows="5" placeholder="太ももの筋肉を動かすことを意識すると効果的"></textarea><br>
                <button>今日の運動を登録</button>
            </form>

        <h1>運動一覧(未実装)</h1>
        <table border="1">
        <tr>
            <th>メニュー
            <th>時間
            <th>強度
            <th>目的
            <th>詳細
        <tr>
            <td>さんぽ
            <td>30
            <td>強い
            <td>運動不足
            <td>運動不足解消
            <td><a href="./detail.html">詳細閲覧</a>
            <td><a href="./edit.html">編集</a>
            <td><form action="./top.html"><button>完了</button></form>
     </form>
        </table>
        <!-- ページネーション -->
        現在 1 ページ目<br>
        <a href="./top.html">最初のページ(未実装)</a> / 
        <a href="./top.html">前に戻る(未実装)</a> / 
        <a href="./top.html">次に進む(未実装)</a>
        <br>
        <hr>
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection