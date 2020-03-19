<?php
session_start();
include_once 'includes/header.php';

?>

<h2 style="font-family:'Poppins', sans-serif;" id="alinha-texto-centro" class="mt-4 mb-4">LINHA DE PRODUTOS</h2>
       <!-- !º Linha de conteúdo -->
<?php
if(isset($_SESSION['compra'])) {
    echo '
    <div class="container alert alert-success" role="alert">
        '.$_SESSION['compra'].'
    </div>
    ';
}
?>    
       <div class="row col-10 mt-sm-6 mb-4 ml-auto mr-auto">
    <?php
    
    require("conexao.php");
    $sql = "SELECT * FROM produtos";
    $qr = mysqli_query($conn, $sql);
    while($ln = mysqli_fetch_assoc($qr)) {
        
        echo '<div id="animar" class="col-3 mb-5">';
        echo '<div class="card text-center">';
            echo '<img class="card-img-top" src="img/'.$ln['imagem'].'">';
            echo '<div class="card-body">';
                echo '<h5 id="espaco" class="card-title text-left">R$'.number_format($ln['preco'], 2,',','.').'</h5>';

                    echo '<h5 id="espaco" class="card-title">'.$ln['nome'].'</h5>';
                    echo '<a id="azul-escuro" class="btn col-12" href="finalizaPagamento.php?acao=add&id='.$ln['id'].'">Comprar</a>';
                    echo '<a style="border: 1px #193E59 solid;" id="azul-escuro-legenda" class="mt-1 btn col-12" href="carrinho.php?acao=add&id='.$ln['id'].'">Adicionar ao carrinho</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    
    }


    ?>    
    </div>
<?php
include_once 'includes/footer.php';
?>