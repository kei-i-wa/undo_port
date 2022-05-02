@extends('layout')
{{-- メインコンテンツ --}}
@section('contets')
    <div class="body">
        <img class="logo" src="../../title.png" width="300px" height="50px"/>
        <h5 class="detail-title">{{ $undo->menu }}の詳細</h5>
        <table>
            <tr>
                <th><i class="bi bi-pencil">メニュー</i></th>
                <td>{{ $undo->menu }}</td>
            </tr>
            <tr>
                <th>
                    <i class="bi bi-alarm-fill"></i>
                </th>
                <td>
                    {{ $undo->minutes }}分
                </td>
            </tr>
            <tr>
                <th>
                    <i class="bi bi-heart-pulse"></i>
                </th>
                <td>
                    {{ $undo->getLevelString() }}
                </td>
            </tr>
            <tr>
                <th>
                    <i class="bi bi-flag-fill">目的</i>
                </th>
                <td>
                    {{ $undo->target }}
                </td>
            </tr>
            <tr>
                <th>
                    詳細
                </th>
                <td>
                    {{ $undo->detail }}
                </td>
            </tr>
        </table>
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