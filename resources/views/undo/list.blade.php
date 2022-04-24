@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>運動の登録(未実装)</h1>
            <form action="./top.html" method="post">
                メニュー<input><br>
                所要時間<input><br>
                運動強度<select name="task_level">
                    <option value="high">高（会話が出来ないレベル）</option>
                    <option value="middle">中（息が上がるレベル）</option>
                    <option value="high">軽（息が上がらないレベル）</option>
                </select><br>
                目的<input><br>
                詳細<textarea></textarea><br>
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