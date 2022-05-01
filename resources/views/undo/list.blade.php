@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

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
                <span style="color:green;">Success!</span><br>
        @endif
        @if (session('front.undo_delete_success') == true)
                <span style="color:red;">Success!</span><br>
        @endif
            

        <table class="table table-striped" id="list">
            <thead>
                <tr>
                    <th><i class="bi bi-pencil">メニュー</i>
                    <th><i class="bi bi-alarm-fill"></i>
                    <th><i class="bi bi-heart-pulse"></i>
                    <th><i class="bi bi-flag-fill">目的</i>
                    <!--<th><i class="bi bi-chat-left-dots">コメント</i>-->
                    <th><i class="bi bi-person-fill"></i>
                    <th>
            </thead>
            <tbody>
                 @foreach ($list as $undo)
                <tr>
                    <td>{{ $undo->menu }}
                    <td>{{ $undo->minutes }}
                    <td>{{ $undo->getLevelString() }}
                    <td>{{ $undo->target }}
                    <!--<td>{{ $undo->detail }}-->
                    <td>{{ $undo->user_id }}
                    <td><a href="{{ route('detail', ['undolist_id' => $undo->id]) }}">…</a>
                @endforeach
            </tbody>
       
       
     </form>
        </table>
         <!-- ページネーション -->
        {{-- {{ $list->links() }} --}}
         {{ $list->currentPage() }} ページ目<br>
        @if ($list->onFirstPage() === false)
        <a href="/undo/list"><<</a>
        @else
        <<
        @endif
        
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}"><</a>
        @else
            <
        @endif
        /
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}">></a>
        @else
            >
        @endif
        <br>
        
        
        <form action="/undo/register" method="post">
                @csrf
                <i class="bi bi-sticky"> </i>
                <input name="menu" value="{{ old('menu') }}" maxlength="40" required="true" placeholder="メニュー名 例:散歩！"><br>
                <i class="bi bi-alarm-fill"> </i>
                <input name="minutes" value="{{ old('minutes') }}" size="8" maxlength="3" required="true" placeholder="所要時間">分<br>
                <i class="bi bi-heart-pulse"> </i>
                <select name="level">
                    <option value="3" @if (old('level') == 3) selected @endif>高（会話が出来ない）</option>
                    <option value="2" @if (old('level',2) == 2) selected @endif>中（息が上がる）</option>
                    <option value="1" @if (old('level') == 1) selected @endif>軽</option>
                </select><br>
                <label>目的</label><br>
                <input name="target" value="{{ old('target') }}" placeholder="例：運動不足解消"><br>
                <label>その他詳細（あれば）</label><br>
                <textarea name="detail" value="{{ old('detail') }}"cols="50" rows="5" placeholder="太ももの筋肉を動かすことを意識すると効果的"></textarea><br>
                <button>今日の運動を登録</button>
            </form>
        <hr>
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        <a href="/mylist">私</a><br>
        </menu>
        </div>
@endsection