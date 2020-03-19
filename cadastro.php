<?php
session_start();
include_once "conexao.php";
// Quando o usuário realizar seu cadastro e apertar no botão virá para essa página, em que terá as suas validações
$email = isset($_POST['email'])?$_POST['email']:'';
$senha = md5(isset($_POST['senha'])?$_POST['senha']:'');
$confSenha = md5(isset($_POST['confSenha'])?$_POST['confSenha']:'');
    
// Esse código sql vai ser responsável por ver os email de todos os usuários
$sql = "SELECT * FROM usuarios WHERE email='$email'";
// Mysqli_query é o código que consegue realizar a consulta ao Banco de Dados
$acao = mysqli_query($conn, $sql);

// Obtem uma linha do resultado como uma matriz associativa, numérica, ou ambas

while ($array = mysqli_fetch_array($acao)){
    $emailBanco = $array['email'];
}
// Função que conta a quantidade de linhas em uma array
$linhas = mysqli_num_rows($acao);
    
if($linhas > 0 ){
    //Condição que olha se possui email igual Email já cadastrado, caso seja maior que 0 é porque já existe esse email
    
    session_start();
    
    $_SESSION['msg'] = "Email já cadastrado!";
    header("Location: inicio.php");

} else {
    // Preencher todos os campos
    // A seguir terá uma condição que olha se o usuário escreveu de forma correta os campos de senha
    if($senha == $confSenha) {
        // Assim haverá o código sql em que vai inserir email e senha para a tabela usuários 
        $sql = "INSERT INTO usuarios(email, senha) VALUES
        ('$email', '$senha')";

        $query = mysqli_query($conn, $sql);

        session_start();        
        // echo "Cadastro realizado com sucesso!";
        $_SESSION['msg'] = "Cadastro realizado com sucesso!";
        header("Location: inicio.php"); 
    } else {
        // Caso não ocorra, irá dizer que os campos não são iguais
        // E criando a mensagem de erro
        session_start();
        // echo "'Email' e 'Confirmar Senha' não são iguais";
        // Todos os resultados serão impressos por essas variáveis de sessão e impressos no formulário de login
        $_SESSION['msg'] = "'Email' e 'Confirmar Senha' não são iguais";
        header("Location: inicio.php");
    } 
}
// Caso não esteja muito claro, entra em contato comigo ou pesquisa no Google para ter informações melhores
// A própria documentação do PHP explica muito tudo isso
?>