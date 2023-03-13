<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Editar Usuário</title>

    <style>

.center {
  position: absolute;
/*  top: 0;
  bottom: 0; */
  left: 0;
  right: 0;
  margin: auto;  
}
    </style>
</head>

<body>


    <?php

    $id = $_GET["idUsuario"];



    include("./conexao/conexao.php");
    $pdo = conectar();

    $sql = "SELECT idUsuario, nomeUsuario,loginUsuario, emailUsuario,senhaUsuario FROM tblUsuario WHERE idUsuario= ?";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(1, $id);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id        = $row["idUsuario"];
        $nome      = $row["nomeUsuario"];
        $login      = $row["loginUsuario"];
        $email = $row["emailUsuario"];
        $senha = $row["senhaUsuario"];
    }

    ?>


    <div class="container" >

    <div class="d-flex align-items-center justify-content-center">
        <form action="edita.php" method="post"  >
          
            <p>Editar Cadastro</p> 


            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="number" name="id" id="id" class="form-control" value="<?php echo $id; ?>" min="1" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $nome; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Login</label>
                <input type="text" name="login" id="login" class="form-control" value="<?php echo $login; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" value="<?php echo $senha; ?>" required>
            </div>
            <button type="submit" id="button" class="btn btn-primary" <?php echo "onclick=window.location.href=edita.php?=" . $id . ";"  ?>>Editar</button>
        </form>

    </div>
  
</div>
</body>

</html>