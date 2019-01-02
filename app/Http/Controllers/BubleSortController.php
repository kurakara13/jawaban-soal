<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BubleSortController extends Controller
{
    public function index(){

      return view('buble-sort.index');
    }

    public function bubleSort(Request $request){
      $data = str_split($request['datainput']);
      $n=count($data);
      $tampil = '';
      for ($i = 0;$i<$n-1;$i++){
        $NoIte=$i;
        $tampil .= "Iterasi ke-$NoIte <br>";
        for ($j = $n-2;$j>$i;$j--){
          $tampil .= "nilai ".$data[$j+1]." pengecekan dengan ".$data[$j]."<br>";

              if ($data[$j] > $data[$j+1]){
                $tampil .= "karena nilai ".$data[$j+1]." lebih kecil dari ".$data[$j]." maka bertukar <br>";
                  $data[$j] = $data[$j] + $data[$j+1];
                  $data[$j+1] = $data[$j] - $data[$j+1];
                  $data[$j] = $data[$j] - $data[$j+1];
              }else {
                $tampil .= "nilai tidak bertukar <br>";
              }
              $tampil .= implode(', ',$data);
              $tampil .= "<br><br>";
          }
      }
      $tampil .= "Selesai";

      $dataParse = array('data' => $data, 'tampil' => $tampil );

      $dataJSON = json_encode($dataParse);

      return $dataJSON;
    }
}
