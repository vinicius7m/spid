<?php
session_start();
include_once 'conexao.php';

if(!isset($_SESSION['usuario'])) {
    header("Location:perguntaUsuario.php");
} else {

$nome           = isset($_POST['nome'])?$_POST['nome']:'';
$sobrenome      = isset($_POST['sobrenome'])?$_POST['sobrenome']:'';
$cpf            = isset($_POST['cpf'])?$_POST['cpf']:'';
$endereco       = isset($_POST['endereco'])?$_POST['endereco']:'';
$enderecoMelhor = isset($_POST['enderecoMelhor'])?$_POST['enderecoMelhor']:'';

$sql = "INSERT INTO pedido(nome,sobrenome,cpf,endereco,enderecoMelhor) VALUES('$nome','$sobrenome','$cpf','$endereco','$enderecoMelhor')";
mysqli_query($conn,$sql);

$nomeCartao   = isset($_POST['nomeCartao'])?$_POST['nomeCartao']:'';
$numeroCartao = isset($_POST['numeroCartao'])?$_POST['numeroCartao']:'';
$mes          = $_POST['mes'];
$ano          = $_POST['ano'];
$codSeg       = isset($_POST['codSeg'])?$_POST['codSeg']:'';

$sql = "INSERT INTO cartao(nome_cartao, numero_cartao,mes,ano,cod_seg) 
VALUES
('$nomeCartao','$numeroCartao','$mes','$ano','$codSeg')";
mysqli_query($conn,$sql);
$_SESSION['compra'] ="Sua compra foi realizada com sucesso!";
header("Location:produto.php");
}
?>