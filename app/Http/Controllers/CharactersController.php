<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Characters;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

class CharactersController extends Controller
{
    public function loginUCP(Request $request)
    {
        $ucpName = $request['ucp'];
        $pass = $request['password'];

        $account = Account::where('Username', $ucpName)->first();

        if ($account) {
            if ($account->SecretWord == $pass) {
                $characters = Characters::where('master','=',$account->ID)->get();

                session()->put('user', $ucpName);
                return view('welcome',compact('characters'));
            } else {
                return redirect()->back()->with('alert', 'Wrong password');
            }
        }
    }
//    public function show(Request $request)
//    {
//        // dd($request);
//        $character = Characters::where('char_name','like',"%$request->name%")->get();
//        @dd($character);
//        return view('characters.show', compact('character'));
//    }

    public function logout(){
        session()->forget('user');
        return redirect()->route('index');
    }

}
