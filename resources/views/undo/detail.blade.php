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
            <tr>
                <th>
                    投稿日
                </th>
                 <td>
                     {{ date('Y年m月d日',strtotime($undo->created_at)) }}
                </td>
            </tr>
        </table>
        @if($undo->user_id === Auth::id())
        <form action="{{ route('delete', ['undolist_id' => $undo->id]) }}" method="post" style="margin-top:20px;">
            @csrf
            @method("DELETE")
            <button class="btn btn-sm mx-auto btn-danger mb-3" id="submit" onclick='return confirm("削除します(削除したら戻せません)。よろしいですか？");'>削除する</button>
        </form>
        @endif
        <menu label="リンク" id="footer-fix">
            <ul id="footer-fix-menu">
                <li><a href="/logout"><i class="bi bi-door-open-fill">ログアウト</i></a></li>
                <li><a href="/undo/mylist"><i class="bi bi-person-fill">マイページ</i></a></li>
                <li><a href="/undo/list"><i class="bi bi-house-door">投稿一覧</i></a></li>
                <li><a href="/undo/new"><i class="bi bi-pencil-fill">新規投稿</i></a></li>
            </ul>
        </menu>
@endsection