<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UndoRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Undolist as UndoModel;

class UndoController extends Controller
{
    /**
     * トップページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $per_page = 25;
        $list = UndoModel::orderBy('created_at', 'DESC')
                         ->paginate($per_page);
        return view('undo.list',['list'=>$list]);
    }
    
    public function mylist(){
        $per_page = 25;
         $list = UndoModel::where('user_id', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->paginate($per_page);
        return view('undo.mylist',['list'=>$list]);
    }
    
    public function detail($undolist_id)
    {
        $undo = UndoModel::find($undolist_id);
        //var_dump($undo); exit;
         if($undo === null){
             return redirect('/undo/list');
        }
        return view('undo.detail', ['undo' => $undo]);
    }
    
     public function delete(Request $request,$undolist_id)
    {
        // task_idのレコードを取得する
        $undo = UndoModel::find($undolist_id);
       if ($undo !== null) {
            $undo->delete();
            $request->session()->flash('front.undo_delete_success', true);
        }
        return redirect('/undo/list');
    }
    
   
    
    public function register(UndoRegisterPostRequest $request){
        $datum = $request -> validated();
        $user = Auth::user();
        $id = Auth::id();
        //var_dump($datum, $user, $id); exit;
        
        
        // user_id の追加
        $datum['user_id'] = Auth::id();

        // テーブルへのINSERT
        try{
            $r = UndoModel::create($datum);
        }catch(\Throwable $e){
             echo $e->getMessage();
            exit;
        }
        
        $request->session()->flash('front.undo_register_success', true);
        return redirect('/undo/list');
        
//var_dump($r); exit;
    }
}