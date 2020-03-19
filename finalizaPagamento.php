<?php
session_start();
// if(!isset($_SESSION['usuario'])) {
//     header("location:inicio.php");
// }

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
include_once 'includes/header.php';
?>

<?php
    $array[1] = 10;
    $array = array(1 => 10, 2=>1);
?>


<h2 class="ml-5">Finalizar a compra</h2>

<section class="dados-pagamento">
<?php
    if(count($_SESSION['carrinho']) == 0) {
        echo '<tr><center>Não há produto, adicione um</center></tr>';
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
                        
            echo '
            <div class="produtos">
                <td><a id="azul-escuro-legenda" href="?acao=del&id='.$id.'">&times; </a>'.$nome.' ('.$qtd.')</td>            
            </div>

            <div class="preco">
                <td>R$ '.$sub.'</td>
            </div>
            <br>
            ';      
            }
            @$total= number_format($total, 2,',','.');

            echo '
                <strong>
                    <div class="total">
                        
                        <td>Total</td>            
                    </div>
                    <div class="total-preco">
                        <td>R$ '.$total.'</td>
                    </div>
                </strong>
            ';
    }
    ?>
</section>
<section style="width: 650px; border: 1px solid #ccc; padding-bottom: 40px; background: #fefefe; border-radius: 5px;" class="form-pagamento mb-5">
    <form action="pedido.php" method="POST">
        <h4>Cartão</h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input name="nome" type="text" class="form-control" placeholder="Seu nome"> 
            </div>

            <div class="form-group col-md-6">
                <input name="sobrenome" type="text" class="form-control" placeholder="Seu sobrenome">
            </div>
        </div>
        <div class="form-row">
            
            <div class="form-group col-md-6">
                <input name="nomeCartao" type="text" class="form-control" placeholder="Nome do cartão" required>
            </div>
            <div class="fomr-group col-md-6">
                <input name="cpf" type="text" class="form-control" placeholder="CPF" max-lenght="11" required>
            </div>            
        </div>

        <div class="form-group">
            <input name="numeroCartao" type="text" class="form-control" placeholder="Número do cartão" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <select name="mes" class="form-control">
                    <option selected>MM</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select name="ano" class="form-control">
                    <option selected>AAAA</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <input name="codSeg" type="text" class="form-control" placeholder="Código de segurança" required>
            </div>
            
            </div>
            <h4>Endereço</h4>
            
            <div class="form-row">
                <div class="form-group col-md-12"> 
                    <input name="endereco" type="text" class="form-control" placeholder="Endereço(primário)" required>
                </div>
            </div>
        
        <h4>Melhor endereço</h4>
        <div class="form-row">
                <div class="form-group col-md-12">
                    <input name="enderecoMelhor" type="text" class="form-control" placeholder="Endereço(secundário)">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="checked" id="invalidCheck" required>
            <label class="form-check-label mb-1" for="invalidCheck">
                Concordo com todos os <strong>Termos & Serviços</strong>
            </label>
            
            <div class="float-right">
                <a style="border: 1px solid #193E59;" id="azul-escuro-legenda" href="produto.php" class="btn btn-link">Adicionar produto</a>
                <input type="submit" id="azul-escuro" class="btn" name="finaliza" value="Finalizar compra">
                
            </div>
        </div>
        
        </div>
        
        
    </form>
</section>

<?php
include_once 'includes/footer.php';
?>