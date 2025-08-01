<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Query\Builder;
class MainController extends Controller
{
    public function index(){

       //UPDATE
                  
       // DB::table('clients')
       //     ->where('id',1)
       //     ->update([
       //         'client_name' =>'alterado',
       //         'email'=>'alterado@gmal.com'
       //     ]);


       //DELETE 
       //existem 2 tipos de delete o hard e o soft 
       //o soft delete é quando o registro é marcado como excluido, mas ainda existe no banco de dados
       //ele consiste em apenas adicionar uma data ao campo deleted_at  e eu posso fazr uma logica onde
       //o sistema não mostra o registro ao usuario mas ele permanece lá 

       //hard delete
       //  é quando o registro é realmente excluido do banco de dados, não existe mais 
       //   DB::table('users')
       //   ->where('id',10)
       //   ->delete();


       //soft delete
       //  é quando o registro é marcado como excluido, mas ainda existe no banco de dados 
       //abaixo eu usei a função now da lib carbon para adicionar a data atual no campo deleted_at
       //para que o soft delete funcione, é necessário que a tabela tenha o campo deleted_at
       //e o campo deleted_at deve ser do tipo timestamp ou datetime 

       
       DB::table('users')
          ->where('id',10)
          ->update([
                'deleted_at' => Carbon::now()
          ]);
       
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
