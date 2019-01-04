<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BankAccount;
use Auth;

class BankController extends Controller
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

    public function index()
    {
        $bank_account = BankAccount::where('user_id', Auth::user()->id)->get();
        if(session()->has('account_id')){
          $bank_ammount = BankAccount::select('ammount')->where('user_id', Auth::user()->id)->where('id', session()->get('account_id'))->first();
        }else {
          $bank_ammount = BankAccount::select('ammount')->where('user_id', Auth::user()->id)->first();
        }

        return view('bank.index', compact('bank_account', 'bank_ammount'));
    }
}
