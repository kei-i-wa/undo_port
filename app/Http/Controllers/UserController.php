<?php
declare(strict_types=1);
namespace App\Http\Controllers;
//requestクラス使用のため
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPostRequest;
//モデルファイルにアクセスし、DB格納
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }
    
    public function register(UserRegisterPostRequest $request){
          $datum = $request->validated();
        $datum['password']= Hash::make($datum['password']);
        try{
            $r = UserModel::create($datum);
             $request->session()->flash('front.user_register_success',true);
             return redirect('/');
        }catch(\Throwable $e){
            echo $e->getMessage();exit;
            $request->session()->flash('front.user_register_failure', true);
            return view('user.index');
        }
    }
}