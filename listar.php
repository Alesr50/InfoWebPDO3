<?php

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
//echo strtoupper($_SESSION['usuario']); 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <title>Lista de Usuários</title>


  <script language="Javascript">
    function confirmacao(id) {
      var resposta = confirm("Deseja remover esse registro?");
      if (resposta == true) {
        window.location.href = "deleta.php?idUsuario=" + id;
      }
    }
  </script>

</head>

<body>


  <div class="container">
    <table id="myTable" class="table">
      <thead class="thead-dark">
        <?php

        include("./conexao/conexao.php");
        $pdo = conectar();
        $sql = "SELECT idUsuario, nomeUsuario,loginUsuario, emailUsuario,senhaUsuario FROM tblUsuario where ativo=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          echo "
    <tr>
        <th >ID</th>
        <th>Nome</th>        
        <th>Email</th>
        <th></th>
        <th></th>
      </tr>        
      </thead>
    <tbody>";

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id        = $row["idUsuario"];
            $nome      = $row["nomeUsuario"];
            $login      = $row["loginUsuario"];
            $email = $row["emailUsuario"];
            $senha = $row["senhaUsuario"];
        echo "<tr>
        <td>" . $row["idUsuario"] . "</td>
        <td>" . $row["nomeUsuario"] . "</td>
        <td>" . $row["emailUsuario"] . "</td> 
        <td> <button type='button' class='btn btn-info btn-lg' data-toggle='modal'  data-target='#myModal'>Editar</button></td>     
        <td><a href='javascript:func()' onclick='confirmacao(".$row["idUsuario"].")' >Excluir</a></td>
    </tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }



        ?>

<!--   <td><a href='editar.php?idUsuario=" . $row["idUsuario"] . "'>Editar</a></td> -->

        <!-- Trigger the modal with a button -->
    

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
              <form action="edita.php"   >
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
            <button type="submit" id="button" class="btn btn-primary" >Editar</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>


        </tbody>
    </table>

  </div>
</body>

</html>