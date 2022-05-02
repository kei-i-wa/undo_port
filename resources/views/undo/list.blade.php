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
            <span style="color:green;">Success!</span><br>
        @endif
        @if (session('front.undo_delete_success') == true)
            <span style="color:red;">Success!</span><br>
        @endif
        
        <table>
                <tr>
                    <th width="25%" style="padding-right:8px;"><i class="bi bi-pencil">メニュー</i>
                    <th width="10%"><i class="bi bi-alarm-fill"></i>
                    <th width="10%"><i class="bi bi-heart-pulse"></i>
                    <th width="35%"><i class="bi bi-flag-fill">目的</i>
                    <!--<th><i class="bi bi-chat-left-dots">コメント</i>-->
                    <th width="10%"><i class="bi bi-person-fill"></i>
                    <th width="10%">
                 @foreach ($list as $undo)
                <tr>
                    <td>{{ $undo->menu }}
                    <td>{{ $undo->minutes }}分
                    <td>{{ $undo->getLevelString() }}
                    <td>{{ $undo->target }}
                    <!--<td>{{ $undo->detail }}-->
                    <td>{{ $undo->user_id }}
                    <td><a href="{{ route('detail', ['undolist_id' => $undo->id]) }}">…</a>
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
        
        <form action="/undo/register" method="post">
        @csrf
        <table>
            <tr>
                <th class="form-title"><i class="bi bi-pencil">メニュー　</i></th>
                <td class="form-item"><input name="menu" value="{{ old('menu') }}" maxlength="40" required="true" placeholder="メニュー名 例:散歩！"></td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-alarm-fill"> </i></th>
                 <td class="form-item"><input name="minutes" value="{{ old('minutes') }}" size="8" maxlength="3" required="true" placeholder="所要時間">分</td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-heart-pulse"></th>
                 <td class="form-item">
                    <select name="level">
                    <option value="3" @if (old('level') == 3) selected @endif>高（会話が出来ない）</option>
                    <option value="2" @if (old('level',2) == 2) selected @endif>中（息が上がる）</option>
                    <option value="1" @if (old('level') == 1) selected @endif>軽</option>
                    </select>
                 </td>
             </tr>
             <tr>
                 <th class="form-title"><i class="bi bi-flag-fill">目的</i></th>
                 <td class="form-item"><input name="target" value="{{ old('target') }}" placeholder="例：運動不足解消"></td>
             </tr>
             <!--<tr>-->
             <!--    <th class="form-title">その他</th>-->
             <!--    <td class="form-item"><textarea name="detail" value="{{ old('detail') }}"cols="50" rows="5" placeholder="太ももの筋肉を動かすことを意識すると効果的"></textarea></td>-->
             <!--</tr>-->
             <!--<tr>-->
                 <th class="form-title"></th>
                 <td class="form-item"><button>今日の運動を登録</button></td>
             </tr>
        </table>
        </form>
          <menu label="リンク" id="footer-fix">
            <ul id="footer-fix-menu">
                <li><a href="/logout"><i class="bi bi-door-open-fill">ログアウト</i></a></li>
               
                <li><a href="/undo/list"><i class="bi bi-house-door">投稿一覧</i></a></li>
                
                <li><a href="/undo/mylist"><i class="bi bi-person-fill">マイページ</i></a></li>
            </ul>
        </menu>
        <hr id=footer-line>
    </div>
@endsection