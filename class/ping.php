<?php
require_once "Conexao.php";

function Ping($IP)
{
    $IPAddress = $IP;
     
    $fp = get_headers($IPAddress)[0] ; 

    $status = $fp;
    $conexao = Conexao::fazConexao();
    $query = "UPDATE sites SET request = '$status' WHERE url = '$IP' " ;
    $conexao->query($query);
    
        if($fp == "HTTP/1.1 200 OK")
        {
            return $status = "<div class='text-success'><b>OK (200)</b></div>";
        }
        else
        {
            return $status = "<div class='text-danger'><b>". get_headers($IPAddress)[0] ."</b></div>"; 
            fclose($fp);
        }
}
