<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
       
       //devolvendo todos os dados da tabela  
       // $clients = DB::table('clients')->get();

       //apresentando dados em um array associativo 
       //$clients = DB::table('clients')->get()->toArray();

       //apresentando dados em um array de arrays associativos 
       // $clients = DB::table('clients')->get()->map(function($item){
       //    return (array) $item });

       //apresentando dados apartir dos resulttados
       //   $products = DB::table('products')->get();
       //   foreach($products as $product){
       //      echo $product->product_name.'<br>';
       //  }

       //obter apenas algumas coluna, no caso abaixo eu so quero nome e preço 
       // $products = DB::table('products')->get(['product_name','price']);
       // $this->showTableData($products);

       //obter somente a primeira linha do resultado 
       //$products = DB::table('products')->get()->first();

       // //obter somente a ultima linha do resultado 
      // $products = DB::table('products')->get()->last();

       $this->showRawData($products);

       


       
       
       


       

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
