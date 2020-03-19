<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
  <link rel="icon" href="img/spid_logo.png">
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/finalizaPagamento.css">
  <link rel="stylesheet" href="css/perguntaUsuario.css">
  <!-- <link rel="stylesheet" href="ferramentas/node_modules/fontawesome/css/all.css">
  <link rel="stylesheet" href="ferramentas/node_modules/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" href="ferramentas/node_modules/fontawesome/css/brands.css">
  <link rel="stylesheet" href="ferramentas/node_modules/fontawesome/css/solid.css"> -->
  <link rel="stylesheet" href="css/animacoes.css">
  <!-- Links CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Spid</title>
</head>
<body>
  
      <nav id="preto" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a><img style="width: 25px; height:25px; margin-right: 5px;" src="img/spid_logo.png" alt=""> </a>
        <a class="navbar-brand" href="inicio.php"> Spid</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="principal.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produto.php"> Linha de Produtos</a>
            </li>        
            <li class="nav-item">
              <a class="nav-link" href="inicio.php?#empresa">
                Empresa
              </a>
            </li>
            
            <div style="margin-left:700px;">
              <?php
              
              if(isset($_SESSION['usuario'])) {
                echo ' 
                <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$_SESSION['usuario'].'
                  </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item bg-dark text-white">'.$_SESSION['usuario'].'</a>
                  <a class="dropdown-item bg-dark text-white" href="carrinho.php">Carrinho de compra</a>
                  <a class="dropdown-item bg-dark text-white" href="logout.php">Sair</a>
                </div>
                </li>              
                
                ';
              }
            
              ?>
            </div>
            </ul>   
        </div>
        
      </nav>

    <!-- Modal de Cadastro -->
    <div class="modal fade modal-bd-example-modal-sm" id="modalCadastro" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cadastrar-se</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>
          
          <div class="modal-body">
          <center><i style="color: #1E272E;" class="fas fa-user-circle fa-6x mb-3"></i></center>

            <form action="cadastro.php" method="POST">             
              <fieldset class="form-group">
              
              <!-- <label>E-mail</label> -->
              <input name="email" type="email" class="form-control mb-1" maxlenght="30" placeholder="E-mail" required>

              <!-- <label>Senha</label> -->
              <input name="senha" type="password" class="form-control mb-1" placeholder="Senha" maxlenght="15" required>

              <!-- <label>Confirmar senha</label> -->
              <input name="confSenha" type="password" class="form-control mb-1" maxlenght="15" placeholder="Confirmar senha" required>

              </fieldset>

              <input id="azul-escuro" type="submit" class="btn btn-block btn-dark" value="Cadastrar" name="enviar">
              
            </form>      
          </div>
          
          <div class="modal-footer">
          <button style="color: #1c1c1c;" class="btn btn-link" href="inicio.php">Já tem uma conta? <strong>Fazer login</strong></button>
          </div>
        </div>
      </div>            
    </div>