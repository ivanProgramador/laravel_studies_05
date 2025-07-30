<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){

      //select usando o where no caso abaixo eu quero selecionar o porduto cujo o id e 10 
      //$products = DB::table('products')->where('id',10)->get();

      //agora eu faço um teste logico onde eu quero selecionar varirios produtos com o id igual maior que 10 
      // $products = DB::table('products')->where('id','>=',10)->get();

      // selecionando produtos com o valor maior que 50,00
      // $products = DB::table('products')
      //              ->where('price','>',50)
      //              ->get();
      //

     //selecionando os produtos que tem o valor maioro ou igual a 50 e que comecem com a letra a  
     //  $products = DB::table('products')
     //               ->where('price','>',50)
     //               ->where('product_name','like','A%')
     //               ->get();

      
      

    
      
      


      
       $this->showTableData($products);

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
