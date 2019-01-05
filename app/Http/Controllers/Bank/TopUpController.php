<?php

namespace App\Http\Controllers\Bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BankAccount;
use App\TopUp;
use Auth;
use Illuminate\Support\Facades\Hash;

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
        $ammount = 0;

        if(session()->has('account_id')){
          $bank_ammount = BankAccount::select('ammount', 'id')->where('user_id', Auth::user()->id)->where('id', session()->get('account_id'))->first();
        }else {
          $bank_ammount = BankAccount::select('ammount', 'id')->where('user_id', Auth::user()->id)->first();
        }

        if($bank_ammount != null){
          $ammount = $bank_ammount->ammount;
        }

        $topup = TopUp::where('user_id', Auth::user()->id)->where('bank_account_id', $bank_ammount->id)->get();
        // dd($topup[0]->getBankAccount());

        return view('bank.topup.index', compact('bank_account', 'ammount', 'topup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank_account = BankAccount::where('id', $request->bank_account)->first();
        // dd($bank_account);

        if(!Hash::check($request->transaction_code, $bank_account->transaction_code)){
          return back()->with('message-transaction-code', 'Wrong Transaction Code');
        }

        $topup = new TopUp;
        $topup->user_id = Auth::user()->id;
        $topup->bank_account_id = $request->bank_account;
        $topup->ammount = $request->ammount;
        $topup->previous_ammount = $bank_account->ammount;
        $topup->topup_code = str_replace(array('-',' '), '',date('d-m-y H-m-s'));
        $topup->current_ammount = $request->ammount + $bank_account->ammount;
        $topup->information = 'TopUp IDR '.$request->ammount.',00 Bank Account '.$bank_account->account_number;
        $topup->note = $request->note;
        $topup->save();

        $bank_account = BankAccount::find($request->bank_account);
        $bank_account->ammount = $request->ammount + $bank_account->ammount;

        $bank_account->save();

        // $bank_account->save();

        return redirect('bank/topup')->with('message-account', 'TopUp Is Success');
    }
}
