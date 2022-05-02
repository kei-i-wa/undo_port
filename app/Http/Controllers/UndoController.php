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
    public function list()
    {
        $per_page = 10;
        $list = UndoModel::orderBy('created_at', 'DESC')
                         ->paginate($per_page);
        return view('undo.list',['list'=>$list]);
    }
    
     public function new()
    {
        return view('undo.new');
    }
    
    public function mylist(){
        $per_page = 10;
        $list = UndoModel::where('user_id', Auth::id())
                        ->orderBy('created_at', 'DESC')
                        ->paginate($per_page);
        return view('undo.list',['list'=>$list]);
    }
    
    public function detail($undolist_id)
    {
        $undo = UndoModel::find($undolist_id);
         if($undo === null){
             return redirect('/undo/list');
        }
        return view('undo.detail', ['undo' => $undo]);
    }
    
     public function delete(Request $request,$undolist_id)
    {   
        try{
            $undo = UndoModel::find($undolist_id);
            if ($undo !== null) {
                $undo->delete();
                }
        }catch(\Throwable $e){
            $request->session()->flash('front.undo_delete_failure', true);
            return redirect('/undo/list');
        }
        $request->session()->flash('front.undo_delete_success', true);
        return redirect('/undo/list');
    }
    
    public function register(UndoRegisterPostRequest $request){
        $datum = $request -> validated();
        $user = Auth::user();
        $id = Auth::id();
        $datum['user_id'] = Auth::id();
        try{
            $r = UndoModel::create($datum);
        }catch(\Throwable $e){
            $request->session()->flash('front.undo_register_failure', true);
            return redirect('/undo/new');
        }
        $request->session()->flash('front.undo_register_success', true);
        return redirect('/undo/list');
    }
}