<?php
session_start();
include_once 'conexao.php';

$emailLogin = isset($_POST['emailLogin'])?$_POST['emailLogin']:'';
$senhaLogin = md5(isset($_POST['senhaLogin'])?$_POST['senhaLogin']:'');
$entrarLogin = isset($_POST['entrarLogin'])?$_POST['entrarLogin']:''; 
    
if(isset($entrarLogin)) {
    $sql = "SELECT * FROM usuarios WHERE email='$emailLogin'";
    $acao = mysqli_query($conn, $sql);
    // Caso seja POO echo " '".$this->getSenha()."' ";
    while ($array = mysqli_fetch_array($acao)){
        
        $emailBanco = $array['email'];
        $senhaBanco = $array['senha'];
    }
    $linhas = mysqli_num_rows($acao);
        
    if($linhas <= 0) {
        
        session_start();
        $_SESSION['loginErro'] = '<p>Login inválido!</p>'; 
        header("location:inicio.php");
    } else {
        if($senhaLogin != $senhaBanco){
            
            session_start();
            $_SESSION['loginErro'] = '<p>Dados incorretos!</p>';
            header("location:inicio.php");
        }else{
            
            session_start();
            $_SESSION['usuario'] = $emailLogin;
            header("location: principal.php");
        }
    }
}
?>