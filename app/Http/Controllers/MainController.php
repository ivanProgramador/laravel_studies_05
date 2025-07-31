<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Query\Builder;
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


     //nesse caso eu posso inserir mais condições dentro do where usando um array de condições  
     //no caso as condiçoes ficam dentro de um sub array


     //   $products = DB::table('products')
     //                 ->where([
     //                     ['price','>',50],
     //                     ['product_name','like','A%']
     //                 ]
     //                 )
     //                 ->get();


     //Aqui eu uso a função orWhere para fazer buscas mais complexas

     //   $products = DB::table('products')
     //                 ->where('price','>',90)
     //                 ->orWhere(function(Builder $query){
     //                    $query->where('product_name','Banana')
     //                          ->orWhere('product_name','cereja');
     //                 })->get();


    //excluindo uma possibilidades da busca, na busca abaixo eu não quero nenhum porduto que o nome comece com a letra M 

    $products = DB::table('products')->where('product','not like','M%')->get();
 
    //aqui eu faço a amesa cois so que usando a função 

    $products = DB::table('products')->whereNot('product','like','M%')->get();

    //selecionando produtos com o preço entre 2 valores

    $products = DB::table('products')->whereBetween('price',[25,50])->get();

    //selecionando produtos que não estão como preço entre 2 valores

    $products = DB::table('products')->whereNotBetween('price',[25,50])->get();

    //selecionando produtos onde os ids estão entre 1,2 e 3

    $products = DB::table('products')->whereIn('id',[1,2,3])->get();

    

    




    
    


    
     







    
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
