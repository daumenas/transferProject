<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function history()
    {
        return view('history');
    }

    public function createTransfer(Request $request)
    {
        if(User::where('bankID', $request['ToBankID'])->get()->count() <= 0)
        {
            return redirect()->back()->withErrors(['error', 'No bank account with such ID']);
        }

        if($request['money'] < 0)
        {
            return redirect()->back()->withErrors(['error', 'Can not send negative value']);
        }
        $user = Auth::id();

        $user2 = User::where('id', $user)->get()->first();
        $user2->money = $user2->money-$request['money'];
        if ($user2->money-$request['money'] < 0)
        {
            return redirect()->back()->withErrors(['error', 'Not enough money']);
        }
        $user2->save();


        $user1 = User::where('bankID', $request['ToBankID'])->get()->first();
        $user1->money = $user1->money+$request['money'];

        $user1->save();


        $transfer = new Transfer();
        $transfer->FromBankID = $user2->bankID;
        $transfer->ToBankID = $request['ToBankID'];
        $transfer->money = $request['money'];
        $transfer->save();

        return view('transfer');
    }

    public function getUserHistory()
    {
        $user = Auth::id();
        $user2 = User::where('id', $user)->get()->first();

        if(User::where('id', $user)->get()->count() <= 0)
        {
            return redirect('/welcome')->withErrors(['error', 'No such user']);
        }
        $transfer = Transfer::where('ToBankID', $user2->bankID)->orWhere('FromBankID',$user2->bankID)->get();

        return view('history')->with('transfer', $transfer);
    }

    public function transfers()
    {
        return view('transfer');
    }

}
