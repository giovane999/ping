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

    public function sitesCadastrados(Site $site)
    {
        $conexao = Conexao::fazConexao();
        $query = "SELECT * FROM sites ORDER BY request DESC";
        $resultado = $conexao->query($query);
        $resultado = $resultado->fetchAll();
        return $resultado;
    }
    
    public function sitesOnline(Site $site)
    {
        $conexao = Conexao::fazConexao();
        $query = "SELECT * FROM sites WHERE request = 'HTTP/1.1 200 OK'";
        $resultado = $conexao->query($query);
        $resultado = $resultado->fetchAll();
        print_r(count($resultado));
    }

    public function sitesOff(Site $site)
    {
        $conexao = Conexao::fazConexao();
        $query = "SELECT * FROM sites WHERE request = 'HTTP/1.1 200 OK'";
        $query2 = "SELECT * FROM sites";
        $resultado = $conexao->query($query);
        $resultado2 = $conexao->query($query2);
        $resultado = $resultado->fetchAll();
        $resultado2 = $resultado2->fetchAll();
        $resultado3 = count($resultado2) - count($resultado);
  
        print_r($resultado3);
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
