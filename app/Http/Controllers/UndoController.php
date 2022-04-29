<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UndoRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
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
        return view('undo.list');
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