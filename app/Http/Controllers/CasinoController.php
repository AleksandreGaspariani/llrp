<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\Skins;
use Illuminate\Http\Request;

class CasinoController extends Controller
{
    public function slots(){
        if (session('ucp_id') == null){
            return redirect()->route('index');
        }
        return view('casino.slots');
    }
    public function showCharacters(){
        if (session('ucp_id') == null){
            return redirect()->route('index');
        }
        $characters = Characters::where('master','=',session('ucp_id'))->get();
        $skins = Skins::all();
        return view('casino.show_characters',compact('characters','skins'));
    }

    public function chooseCharacter($id, Request $request){
        if (session('ucp_id') == null){
            return redirect()->route('index');
        }
        $character = Characters::where('ID','=',$id)->first();

        session()->put('choosen_character',$character);

        $request->session()->flash('alert', 'Character has been choosen!');
        return redirect()->route('slots',compact('character'));
    }

    public function subCash(){
        dd('here');
    }

    public function changeCharacter(){
        if (session('ucp_id') == null){
            return redirect()->route('index');
        }
        session()->forget('choosen_character');
        return redirect()->route('showCharacters');
    }


}
