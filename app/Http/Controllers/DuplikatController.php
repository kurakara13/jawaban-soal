<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuplikatController extends Controller
{
    public function index(){

      return view('duplikat.index');
    }

    public function cekDuplikat(Request $request){
      $data = str_split($request['datainput']);
      $duplikatCount = array_count_values($data);
      $duplikatData =  '';
      foreach ($duplikatCount as $key => $value) {
        if($value > 1){
          $duplikatData = $key;
          break;
        }else {
          $duplikatData = 'Tidak Ada Data Duplikat';
        }
      }

      return $duplikatData;
    }
}
