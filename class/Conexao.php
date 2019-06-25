<?php

class Conexao
{
    public static function fazConexao()
    {
        $conexao = new PDO('mysql:host=localhost;dbname=ping', 'root', '') or die ("Não foi possível conectar-se ao servidor MySQL [1]");
        return $conexao;
    }

    public static function fazConexao2()
    {
        $conexao2 = new PDO('mysql:host=200.152.183.141;dbname=crm', 'crm', '8njmaTA44xwGF9mb') or die ("Não foi possível conectar-se ao servidor MySQL [1]");
        return $conexao2;
    }
}
