<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        if (session()->has('user')){
            return redirect()->route('profile');
        }
        return view('welcome');
    }
    public function anotherView(){
        if (session()->has('user')){
            $acc = Account::where('Username','=',session()->get('user'))->first();
            if ($acc->Admin >= 5){
                return view('anotherView/index');
            }
            return redirect()->route('index');

        }
        return redirect()->route('index');
    }
}
