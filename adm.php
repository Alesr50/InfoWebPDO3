<!DOCTYPE html>
<html lang="pt-br">


<?php
session_cache_expire(1);
session_start();

if (!isset($_SESSION['usuario'])) {
    //Destrói
    session_destroy();

    //Limpa
    unset($_SESSION['usuario']);
    //  unset ($_SESSION['senha']);

    //Redireciona para a página de autenticação
    header('location:login.html');
}


//session_cache_expire(1);
//session_start();





?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <title>Painel ADM</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="?pg=home.php">Home <span class="sr-only">(Página atual)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuários</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?pg=inserir.php">Cadastrar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?pg=listar.php">Listar</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Alunos</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?pg=frmcadaluno.php">Cadastrar</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?pg=listarAlunos.php">Listar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled " href="#"> <?php echo "Olá " . strtoupper($_SESSION['usuario']); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="logout.php"> <?php echo "Deslogar"; ?></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="cont" class="container">
        <?php
        $pg = (isset($_GET['pg'])) ? $_GET['pg'] : null;  /*Verifica se a variável $pg tem algum valor, se não... Atribui um valor defalt pra variável */

        if ($pg == '') {
            include('home.php');
        } elseif (file_exists($pg)) {
            include $pg;
        } else {
            include "404.php";    /*Aqui ele vai chamar a página de erro.. Coloque a sua...*/
        }
        ?>
    </div>
    <div id="footer"></div>

    <p> <?php





        ?> </p>
</body>

</html>