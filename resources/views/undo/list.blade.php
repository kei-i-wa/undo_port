@extends('layout')
{{-- メインコンテンツ --}}
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
        @if (session('front.undo_register_success') == true)
            <p style="color:green;">投稿完了しました！</p>
        @endif
        @if (session('front.undo_delete_success') == true)
            <p style="color:green;">削除完了しました！</p>
        @endif
        @if (session('front.undo_delete_failure') == true)
            <p style="color:red;">※削除失敗。</p>
        @endif
        <table>
                <tr>
                    <th width="25%" style="padding-right:8px;"><i class="bi bi-pencil">メニュー</i>
                    <th width="10%"><i class="bi bi-alarm-fill"></i>
                    <th width="10%"><i class="bi bi-heart-pulse"></i>
                    <th width="35%"><i class="bi bi-flag-fill">目的</i>
                    <th width="20%"><i class="bi bi-person-fill"></i>
                 @foreach ($list as $undo)
                <tr>
                    <td><a href="{{ route('detail', ['undolist_id' => $undo->id]) }}">{{ $undo->menu }}</a>
                    <td>{{ $undo->minutes }}分
                    <td>{{ $undo->getLevelString() }}
                    <td>{{ $undo->target }}
                    <td>{{ $undo->user->name }}
                @endforeach
        </table>
         <!-- ページネーション -->
        <div class="page">
            {{ $list->currentPage() }} ページ目<br>
            @if ($list->onFirstPage() === false)
            <a href="/undo/list"><i class="bi bi-arrow-counterclockwise"></i></a>
            @else
            <i class="bi bi-arrow-counterclockwise"></i>
            @endif
            
            @if ($list->previousPageUrl() !== null)
                <a href="{{ $list->previousPageUrl() }}"><i class="bi bi-caret-left"></i></a>
            @else
                <i class="bi bi-caret-left"></i>
            @endif
            
            @if ($list->nextPageUrl() !== null)
                <a href="{{ $list->nextPageUrl() }}"><i class="bi bi-caret-right"></i></a>
            @else
                <i class="bi bi-caret-right"></i>
            @endif
        </div>
        <br>
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