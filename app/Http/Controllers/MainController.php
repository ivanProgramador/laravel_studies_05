<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){

       $clients = DB::table('clients')->get();
       $this->showTableData($clients);
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
