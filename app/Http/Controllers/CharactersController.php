<?php

namespace App\Http\Controllers;
use App\Models\Businesses;
use App\Models\CarAssoc;
use App\Models\Houses;
use App\Models\Skins;
use Auth;
use Illuminate\Http\Request;
use App\Models\Characters;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;
use App\Models\Cars;

class CharactersController extends Controller
{
    public function profile(Request $request)
    {
        if (session('ucp_id') == null){
            return redirect()->route('index');
        }
        $characters = Characters::where('master','=',Session('ucp_id'))->get();
        $skins = Skins::all();

        return view('welcome',compact('characters','skins'));
    }
    public function show($id)
    {
        if (session('ucp_id') == null){
            return redirect()->route('index');
        }
        $charCheck = Characters::where('master','=',session('ucp_id'))->get();
        foreach ($charCheck as $charCheck){
            if ($charCheck->ID == $id){
                $char = Characters::where('ID','=',$id)->first();
                $houses = Houses::all();
                $businesses = Businesses::all();
                $skins = Skins::all();
                $cars = Cars::where('carOwner','=',$char->ID)->get();
                $assocs = CarAssoc::all();

                return view('pages.charShow', compact('char','cars','assocs','houses','businesses','skins'));
            }
        }
        return redirect()->route('profile');

    }

    public function logout(){

        // session forget all

        session()->flush();

        return redirect()->route('index');
    }

//    public function insert(){
//
//        for ($i=0; $i<=311; $i++){
//
//            $assoc = new Skins();
//            $assoc->model = $i;
//            $assoc->link = "https://assets.open.mp/assets/images/skins/$i.png ";
//
//            $assoc->save();
////            $assoc = CarAssoc::create([
////                'carId' => $i,
////                'carLink' => "http://weedarr.wdfiles.com/local--files/veh/$i.png",
////            ]);
//
//        }
//
//        return redirect()->route('index');
//
//    }



}
