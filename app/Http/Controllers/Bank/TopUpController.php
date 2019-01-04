<?php

namespace App\Http\Controllers\Bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BankAccount;
use App\TopUp;
use Auth;

class TopUpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bank_account = BankAccount::where('user_id', Auth::user()->id)->get();
        if(session()->has('account_id')){
          $bank_ammount = BankAccount::select('ammount')->where('user_id', Auth::user()->id)->where('id', session()->get('account_id'))->first();
        }else {
          $bank_ammount = BankAccount::select('ammount')->where('user_id', Auth::user()->id)->first();
        }

        $topup = TopUp::where('user_id', Auth::user()->id)->get();

        return view('bank.topup.index', compact('bank_account', 'bank_ammount', 'topup'));
    }
}
