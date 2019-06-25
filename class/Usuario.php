<?php 
require_once "Conexao.php";

class Usuario
{
        public $id;
        public $nome;
        public $email;
        public $senha;
    
    public function cadastraUsuario(Usuaio $usuario)
    {
        $conexao = Conexao::fazConexao();

        // VERIFICA POST VAZIO 
        if(empty($_POST["nome"])  ||  empty($_POST["email"]) || empty($_POST["senha"])  ||  == false){    
            
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            
            $sql = "INSERT INTO login SET  nome = '$usuario->nome', email = '$usuario->email' senha = '$usuario->senha' ";
            $conexao->query($query);
            
            // header("Location: comp/destroi_sessao.php");					
            // header("Location: login.php");			
            die();		
        }

    }    
        
    

    
    
    
    
    
    
    
    









} // FIM CLASSE