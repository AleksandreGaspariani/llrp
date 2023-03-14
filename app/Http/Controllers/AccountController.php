<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountForApprove;
use App\Models\ApproveDeny;
use App\Models\Status;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function ucpRegisterForm(){
        return view('pages/ucp.register');
    }

    public function ucpRegister(Request $request){

        $data = $this->validate($request, [
            'ucp' => 'required',
            'password' => 'required|min:6',
            'secretWord' => 'required',
            'answer' => 'required|min:25',
        ]);

        $data['password'] = hash('whirlpool',$request->password);
        $password = strtoupper($data['password']);

        $checkUsername = Account::where('Username','=',$request->ucp)->first();
        $checkUsername2 = AccountForApprove::where('Username','=',$request->ucp)->first();

        $checkIP = Account::where('LastIP','=',$_SERVER['REMOTE_ADDR'])->first();
        $checkIP2 = AccountForApprove::where('LastIP','=',$_SERVER['REMOTE_ADDR'])->first();

        if ($checkIP != null || $checkIP2 != null){
            if ($checkUsername != null || $checkUsername2 != null){
                $request->session()->flash('alert', 'Account with this name and IP already exists!');
                return redirect()->route('register_form');
            }
            $request->session()->flash('alert', 'You already have an account with this IP!');
            return redirect()->route('register_form');
        }
        if ($checkUsername == null && $checkUsername2 == null){
                $account = new AccountForApprove();
                $account->Username = $request->ucp;
                $account->Password = $password;
                $account->SecretWord = $request->secretWord;
                $account->online = 0;
                $account->Quiz = 1;
                $account->Admin = 0;
                $account->DonateRank = 0;
                $account->Email = '';
                $account->SecretHint = '';
                $account->RegisterDate = date('Y-m-d H:i:s');
                $account->LoginDate = date_timestamp_get(date_create());
                $account->IP = 'n/a';
                $account->LastIP = $_SERVER['REMOTE_ADDR'];
                $account->answer1 = $request['answer'];
                $account->answer2 = '';
                $account->answered_questions = 0;
                $account->Namechanges = 0;
                $account->Phonechanges = 0;
                $account->Discord = '';
                $account->Forum = '';
                $account->AdminNote = '';
                $account->Serial = strtoupper(uniqid()."+".uniqid());

                dd($account);

                $account->save();


                $acc = AccountForApprove::where('Username','=',$request->ucp)->first();
                $id = $acc->ID;

                $generateStatus = new Status();
                $generateStatus->userID = $id;
                $generateStatus->status = 0;

                $generateStatus->save();


                $request->session()->flash('alert', 'You have successfully registered, please wait for approval');
                return redirect()->route('index');

        }else{
            $request->session()->flash('alert', 'UCP with this name already exists.');
            return redirect()->route('index');
        }
    }

    public function ucpApproveForm(){
        if (session('admin') > 1){

            $accounts = AccountForApprove::all();
            $statuses = Status::all();

            return view('admin.approve',compact('accounts','statuses'));
        }
        return redirect()->route('profile')->with('alert','You do not have permission to access this page');

    }

    public function approveUCP($id,Request $request){

        if (session('admin') > 1){

            $status = Status::where('userID',$id);
            $status->update([
                'status' => '1'
            ]);

            $account = AccountForApprove::where('ID',$id)->first();

            $newAccount = new Account();
            $newAccount->Username = $account->Username;
            $newAccount->Password = $account->Password;
            $newAccount->SecretWord = $account->SecretWord;
            $newAccount->Online = $account->Online;
            $newAccount->Quiz = $account->Quiz;
            $newAccount->Admin = $account->Admin;
            $newAccount->DonateRank = $account->DonateRank;
            $newAccount->Email = $account->Email;
            $newAccount->SecretHint = $account->SecretHint;
            $newAccount->RegisterDate = $account->RegisterDate;
            $newAccount->LoginDate = $account->LoginDate;
            $newAccount->IP = $account->IP;
            $newAccount->LastIP = $account->LastIP;
            $newAccount->answer1 = $account->answer1;
            $newAccount->answer2 = $account->answer2;
            $newAccount->answered_questions = $account->answered_questions;
            $newAccount->Namechanges = $account->Namechanges;
            $newAccount->Phonechanges = $account->Phonechanges;
            $newAccount->Discord = $account->Discord;
            $newAccount->Forum = $account->Forum;
            $newAccount->AdminNote = $account->AdminNote;
            $newAccount->Serial = $account->Serial;

            $newAccount->save();

            $deleteAcc = AccountForApprove::where('ID',$id);
            $deleteAcc->delete();

            $request->session()->flash('alert', 'Account approved');
            return redirect()->route('ucpApprove');
        }
        return redirect()->route('profile')->with('alert','You do not have permission to access this page');
    }



    public function denyUCP($id,Request $request){
        if (session('admin') > 1){

            $status = Status::where('userID',$id);

            $status->update([
                'status' => '2'
            ]);

            $request->session()->flash('alert', 'Account denied');
            return redirect()->route('ucpApprove');
        }
        $request->session()->flash('alert', 'You do not have permission to access this page');
        return redirect()->route('profile');
    }

    public function ucpLogin(Request $request)
    {
        $this->validate($request, [
            'ucp' => 'required',
            'password' => 'required'
        ]);

        $data = Account::where('Username', $request->ucp)->first();
        $unverified = AccountForApprove::where('Username', $request->ucp)->first();
        // whirpool hashing
        $passForCheck = $request->password;
        $pass = hash('whirlpool',$passForCheck);

        if ($unverified){
            $status = Status::where('userID',$unverified->ID)->first();
            if ($status->status == 0){
                $request->session()->flash('alert', 'Account is not verified yet');
                return redirect()->back();
            }else if($status->status == 2) {
                $request->session()->flash('alert', 'Account is denied');
                return redirect()->back();
            }
        }

        if ($data){
//            if ($request['password'] == $data->Password) {
            if (strtoupper($pass) == $data->Password) {

            // active session for one hour

                $request->session()->put('user', $data->Username, 60);
                $request->session()->put('ucp_id', $data->ID, 60);
                $request->session()->put('admin', $data->Admin, 60);


                return redirect()->route('profile');
            } else {
                $request->session()->flash('alert', 'Password is incorrect');
                return redirect()->back();
            }
        }
        else {
            $request->session()->flash('alert', 'Account does not exist');
            return redirect()->back();
        }
    }



}
