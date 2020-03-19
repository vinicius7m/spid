<?php
    session_start();
    include_once 'includes/header.php';

    if(!isset($_SESSION['usuario'])) {
        header("location:inicio.php");
    }
    // echo $_SESSION['usuario'];    
?>

<section style="background-image: url(img/banner-principal.jpeg)" class="banner">
    <div id="titulo-principal">
        <h2 id="titulo-produto">Samsung Note 8</h2>
        <a id="principal-link" href="produto.php">Comprar</a>
    </div>
</section>

<section style="background-image: url(img/celular-css.png)" id="banner-sec">
    <!-- <img src="img/celular-css.png" alt=""> -->
    <h2 id="titulo-sec-esq">DO SEU DESKTOP</h2>
    <h2 id="titulo-sec-dir">PARA A SUA MÃO</h2>
</section>

<section class="banner">
<h1 id="titulo-janela" class="mt-4 mb-4 d-flex justify-content-lg-center">outros</h1>
<div class="row col-10 ml-auto mr-auto">
        <div class="col-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/intel-core19.jpg">
                <div class="card-body">
                    <a id="espaco-es" href="produto.php" class="card-title btn btn-link">Intel Core i9</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/fone.jpg">
                <div class="card-body">
                <a id="espaco-es" href="produto.php" class="card-title btn btn-link">Fone de ouvido</a>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card text-center">
                <img class="card-img-top" src="img/nintendo.jpg">
                <div class="card-body">
                <a id="espaco-es" href="produto.php" class="card-title btn btn-link">Nintendo switch</a>
                </div>
            </div>
        </div>
</div>    
</section>
<?php
    include_once 'includes/footer.php';
?>
