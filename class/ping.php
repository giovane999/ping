<?php
require_once "Conexao.php";

function Ping($IP)
{
    $IPAddress = $IP;
     
    $fp = get_headers($IPAddress)[0] ; 

        if($fp == "HTTP/1.1 200 OK")
        {
            return $status = "<div class='text-success'><b>OK (200)</b></div>";
        }
        else
        {
            return $status = print_r(get_headers($IPAddress)[0]); 
            fclose($fp);
        }
}
