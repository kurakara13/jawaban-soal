<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $table = 'topup';


    public function getBankAccount(){

      return $this->belongsTo('App\BankAccount', 'bank_account_id', 'id');
    }
}
