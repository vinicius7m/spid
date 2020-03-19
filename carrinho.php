<?php
session_start();

include_once 'includes/header.php';



if(!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// Adicionar produto
if(isset($_GET['acao'])) {
    // Adicionar carrinho
    if($_GET['acao'] == 'add') {
        $id = intval($_GET['id']);
        if(!isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id] = 1;

        } else {
            $_SESSION['carrinho'][$id] += 1;
        }
        
    }

    // Remover o produto
    if($_GET['acao'] == 'del') {
        $id = intval($_GET['id']);
        if(isset($_SESSION['carrinho'][$id])) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    // Alterar quantidade
    if($_GET['acao'] == 'up') {
        
        if(is_array($_POST['prod'])){
            
            foreach($_POST['prod'] as $id => $qtd) {
                $id = intval($id);
                $qtd = intval($qtd);

                if(!empty($qtd) || $qtd != 0) {
                    $_SESSION['carrinho'][$id] = $qtd;
                } else {
                    unset($_SESSION['carrinho'][$id]);
                }
            }
        }
    }
}
?>

<?php
    $array[1] = 10;
    $array = array(1 => 10, 2=>1);
?>
<section class="banner">
<table class="table table-striped col-8 mt-4 mr-auto ml-auto">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Remover</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>        
        <form action="?acao=up" method="POST">
        <tfoot>
            <td></td>
            <td></td>
            <td><a style="border: 1px solid #193E59;" id="azul-escuro-legenda" class="btn btn-link" href="produto.php">Continuar comprando</a></td>
            <?php
                if(count($_SESSION['carrinho']) > 0) {
                    echo '<td><input style="border: 1px solid #193E59;" id="azul-escuro-legenda" type="submit" class="btn btn-link" value="Atualizar carrinho"></td>';
                    echo '<td><a style="border: 1px solid #193E59;" id="azul-escuro-legenda" class="btn btn-link" href="finalizaPagamento.php">Finalizar a compra</a></td>';
                    
                }
            
            ?>
            
        </tfoot>        

    <tbody>
    <?php
        if(count($_SESSION['carrinho']) == 0) {
            echo '<tr><td colspan="5">Não há produto no carrinho</tr>';
            
        } else {
            require('conexao.php');

            foreach($_SESSION['carrinho'] as $id => $qtd ) {
                $sql = "SELECT * FROM produtos WHERE id = '$id'";
                $qr = mysqli_query($conn, $sql);
                $ln = mysqli_fetch_assoc($qr);

                $nome = $ln['nome'];
                $preco = number_format($ln['preco'], 2,',','.');
                $sub = number_format($ln['preco'] * $qtd, 2,',','.');
                    
                @$total += $ln['preco'] * $qtd; 
                        
                echo '<tr>
                        <td>'.$nome.'</td>
                        <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'"></td>
                        <td>R$ '.$preco.'</td>
                        <td>R$ '.$sub.'</td>
                        <td><a style="color: #555;"href="?acao=del&id='.$id.'">&times;</a></td>
                </tr>';                    
                
                

                }
                @$total= number_format($total, 2,',','.');
                    
                echo '
                <tr>
                    <td colspan="4">Total</td>
                    <td>R$ '.$total.'</td>
                </tr>';
                // echo $totalCarts.$total;
            }
        ?>
        </tbody>
        
        </form>

    </table>
</section>
<?php
    include_once 'includes/footer.php';
?>