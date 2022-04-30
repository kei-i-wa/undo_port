@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>詳細</h1>
        メニュー： {{ $undo->menu }}<br>
        時間： {{ $undo->minutes }}<br>
        強度： {{ $undo->getLevelString() }}<br>
        目的： {{ $undo->target }}<br>
        詳細： <pre>{{ $undo->detail }}</pre><br>
        <hr>
        @if($undo->user_id === Auth::id())
        <form action="{{ route('delete', ['undolist_id' => $undo->id]) }}" method="post">
            @csrf
            @method("DELETE")
            <button onclick='return confirm("削除します(削除したら戻せません)。よろしいですか？");'>削除する</button>
        </form>
        @endif
        
        <menu label="リンク">
        <a href="/undo/list">みんなの運動</a><br>
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection