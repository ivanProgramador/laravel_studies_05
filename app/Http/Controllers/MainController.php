<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Query\Builder;
class MainController extends Controller
{
    public function index(){

    

    /* 
       $count = DB::table('products')->count();
       $max_price = DB::table('products')->max('price');
       $min_price = DB::table('products')->min('price');
       $avg_price = DB::table('products')->avg('price');
       $sum_prices = DB::table('products')->sum('price');
    
       echo'<pre>';
       print_r([
         'count' =>$count,
         'max_price'=> $max_price,
         'min_price'=> $min_price,
         'avg_price'=> $avg_price,
         'sum_prices'=> $avg_price,
        ]);
        echo'</pre>';
      */  
       
     

     //usando o order by para controlar a aordem dos resultados 

     $resultados = DB::table('products')
                   ->orderBy('price','desc')
                   ->limit(3)
                   ->get();

    $this->showTableData($resultados);

    






    }

    private function showRawData($data)
    {
        echo'<pre>';
        print_r($data);
        echo'</pre>';
    }

    private function showTableData($data){
        echo'<table border="1" >';
        //cabecalho
        echo'<tr>';
            foreach($data[0] as $key=>$value){
                 echo'<th>'.$key.'</th>';
            }
        echo'</tr>';

            foreach($data as $row){
                echo'<tr>';
                  foreach($row as $key=>$value){
                 echo'<td>'.$value.'</td>';
                }
                echo'</tr>';
            }

            echo'</table>';




          
    }
}
