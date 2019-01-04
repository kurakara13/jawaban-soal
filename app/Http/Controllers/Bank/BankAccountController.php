<?php

namespace App\Http\Controllers\Bank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BankAccount;
use Auth;
use Illuminate\Support\Facades\Session;

class BankAccountController extends Controller
{
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

        return view('bank.bank-account.index', compact('bank_account', 'bank_ammount'));
    }

    /**
     * Show the form for change account.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountChange(Request $request)
    {
        session(['account_id' => $request->id]);

        return back()->with('message-account', 'Bank Account Has Been Change');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank_account = new BankAccount;
        $bank_account->user_id = Auth::user()->id;
        $bank_account->account_number = $request->account_number;
        $bank_account->account_name = $request->account_name;
        $bank_account->bank_name = $request->bank_name;
        $bank_account->status = $request->status;
        $bank_account->transaction_code = $request->transaction_code;

        $bank_account->save();

        return redirect('bank/bank-account')->with('message', 'New Account Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
