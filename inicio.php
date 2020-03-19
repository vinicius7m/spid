<?php
session_start();
// Cabeçalho 

include_once 'includes/header.php';
?>

<section style="background-image: url(img/inicio.jpg); background-repeat: no-repeat;" class="banner">
    <?php
    if(!isset($_SESSION['usuario'])) {
    ?>

    <div id="corpo-form">  
        
    <form action="processa.php" method="POST" class="form-group">
        <h2>Entrar</h2>  
                
        <label><strong>E-mail</strong></label>
        <input type="text" name="emailLogin" class="col-12 mb-sm-2 form-control" placeholder="Insira seu e-mail" required>
                
        <label><strong>Senha</strong></label>
        <input type="password" name="senhaLogin" class="col-12 mb-sm-2 form-control" placeholder="Insira sua senha" required>
                
        <?php
        if(isset($_SESSION['loginErro'])) {
            echo '
            <div class="alert alert-danger" role="alert">
                '.$_SESSION['loginErro'].'
            </div>
            ';
                
            unset($_SESSION['loginErro']);
        }
        
        if(isset($_SESSION['msg'])) {
            echo '
            <div class="alert alert-success" role="alert">
                '.$_SESSION['msg'].'
            </div>
            ';
            
            unset($_SESSION['msg']);
                }   
        ?>

        <input id="azul-escuro" type="submit" value="Enviar" name="entrar" class="col-12 btn btn-lg btn-dark"><br>
        <button style="color: #1c1c1c;" class="btn btn-link" data-dismiss="modal" data-toggle="modal" data-target="#modalCadastro">Não é inscrito? <strong>Cadastre-se</strong></button>
            
    </form>
        <?php } else { ?>    
    </div>
    
    <div id="titulo-empresa">
        <h1 id="titulo">Spid</h1>
        <p id="descricao">Acelerando a tecnologia!</p>
    </div>
        <?php } ?>
</section>

<section id="empresa" class="banner-empresa">
    <h1 id="titulo-janela" class="mt-4 mb-4 d-flex justify-content-lg-center">Empresa</h1>
    
    <div class="row col-8 ml-auto mr-auto">
        <div class="col-4 mb-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/jva.jpeg">
                <div class="card-body">
                    <h5 id="espaco-e" class="card-title">João Victor Alves</h5>
                </div>
            </div>
        </div>
        
        <div class="col-4 mb-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/jvc.jpeg">
                <div class="card-body">
                    <h5 id="espaco-e" class="card-title">João Victor Vieira</h5>   
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/maria.jpeg">
                <div class="card-body">
                    <h5 id="espaco-e" class="card-title">Maria Rita Matos</h5>                                
                </div>
            </div>
        </div>    
    </div>
    
    <div class="row col-8 mb-4 ml-auto mr-auto d-flex justify-content-center">
        <div class="col-4 mb-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/messias.jpeg">
                <div class="card-body">
                    <h5 id="espaco-e" class="card-title">Messias Adrycio</h5>                    
                </div>
            </div>
        </div>

        <div class="col-4 mb-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/vinicius.jpeg">
                <div class="card-body">
                    <h5 id="espaco-e" class="card-title">Vinícius de Sousa</h5>
                </div>
            </div>
        </div>    
    </div>
    <h5 style="margin-top: -30px;font-family: 'Poppins',sans-serif; color: 797979;"id="alinha-texto-centro">
    "Somos uma empresa em que revende os melhores dispositivos 
    com os preços mais baixos da Terra."
    </h5>
</section>


<!-- Rodapé -->

<?php
    include 'includes/footer.php';
?>