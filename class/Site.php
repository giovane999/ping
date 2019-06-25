<?php
require_once "Conexao.php";

class Site
{
    public $id;
    public $url;

    public function cadastraSite(Site $site)
    {
        $conexao = Conexao::fazConexao();
        $query = "INSERT INTO sites SET url = '$site->url'";
        $res = $conexao->query($query);
    }



    public function Ping($IP,$PORTA)
    {
        $conexao = Conexao::fazConexao();
        $query = "INSERT INTO sites SET url = '$site->url'";
        $res = $conexao->query($query);

        $IPAddress = $IP;
        $Port = $PORTA;
        $fp = @fsockopen ($IPAddress,$Port);

            if(!$fp)
            {
                 return $status = "<div class='text-danger'><b>Offline</b></div>";
            }
            else
            {
                return $status = "<div class='text-success'><b>OK (200)</b></div>";
                fclose($fp);
            }
    }


    public function sitesCadastrados(Site $site)
    {
        $conexao = Conexao::fazConexao();
        $query = "SELECT * FROM sites LIMIT 100";
        $resultado = $conexao->query($query);
        $resultado = $resultado->fetchAll();
        return $resultado;
    }

    public function puxaTodos(Site $site)
    {
        $conexao = Conexao::fazConexao();
        $query = "SELECT * FROM sites  ";
        $resultado = $conexao->query($query);
        $resultado = $resultado->fetchAll();
        print_r(count($resultado));
    }

    public function importar(Site $site)
    {
        $conexao = Conexao::fazConexao2();
        $query = "SELECT * FROM dominio";
        $resultado = $conexao->query($query);

        $local = $conexao_local = Conexao::fazConexao();

        foreach ($resultado as $dominio) {

            $url = $dominio['dominio'];
            $query = "SELECT * FROM sites WHERE url = '{$url}' ";
            $resultado2 = $conexao_local->query($query);
            $resultado2 = $resultado2->fetchAll();
            echo $url;

            //Verificação
            if(count($resultado2) == 0){
                $query = "INSERT INTO sites SET url = '$url'";
                $execute = $conexao_local->query($query);
                echo ' :inserido!';
            }else{
                echo ' :já existe!';
            }

            echo '<br>';
        }
    }

}//TERMINA CLASS
