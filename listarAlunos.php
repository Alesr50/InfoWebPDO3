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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <style>
    .hidetext {
      -webkit-text-security: disc;
      /* Default */
    }
  </style>

  <script>
    $(document).ready(function() {

      $('.editbtn').on('click', function() {

        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#idAluno').val(data[0]);
        $('#nomeAluno').val(data[1]);
        $('#cpfAluno').val(data[2]);
        $('#idadeAluno').val(data[3]);
      


      });
    });
  </script>
  <script language="Javascript">
    function confirmacao(id) {
      var resposta = confirm("Deseja remover esse registro?");
      if (resposta == true) {
        window.location.href = "deletaAluno.php?idAluno=" + id;
      }
    }


  </script>


  <title>Lista de Usuários</title>




</head>

<body>


  <div class="container">
    <table id="myTable" class="table">
      <thead class="thead-dark">
        <?php

        include("./conexao/conexao.php");
       
        $sql = "SELECT idAluno,nomeAluno, cpfAluno,idadeAluno FROM tblAlunos where ativo=1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          echo "
    <tr>
        <th >ID</th>
        <th>Nome</th>        
        <th>CPF</th>
        <th>Idade</th>       
        <th></th>
        <th></th>
      </tr>        
      </thead>
    <tbody>";

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id        = $row["idAluno"];
            $nome        = $row["nomeAluno"];
            $cpf      = $row["cpfAluno"];
            $idade      = $row["idadeAluno"];
                echo "<tr>
        <td>" . $row["idAluno"] . "</td>
        <td>" . $row["nomeAluno"] . "</td>
        <td>" . $row["cpfAluno"] . "</td> 
        <td>" . $row["idadeAluno"] . "</td> 
       
        <td><button type='button' class='btn btn-primary editbtn' data-bs-toggle='modal'  data-bs-target='#editModal' >Editar</button></td>     
        <td><button type='button' class='btn btn-primary' onclick='confirmacao(" .$row["idAluno"] . ")' >Excluir</a></td>
    </tr>";
          }
          echo "</table>";
        } else {
          echo "0 results";
        }



        ?>

        <!--   <td><a href='editar.php?idUsuario=" . $row["idUsuario"] . "'>Editar</a></td> -->

        <!-- Trigger the modal with a button -->



        </tbody>
    </table>




  </div>


  <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
  <div class="modal" tabindex="-1" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="idAluno" id="idAluno">

          <div class="form-group">
            <label> Nome de Usuario </label>
            <input type="text" name="nomeAluno" id="nomeAluno" class="form-control" placeholder="Nome do Aluno">
          </div>

          <div class="form-group">
            <label> CPF </label>
            <input type="text" name="cpfAluno" id="cpfAluno" class="form-control" placeholder="CPF do Aluno">
          </div>

          <div class="form-group">
            <label> Idade</label>
            <input type="number" name="idadeAluno" id="idadeAluno" class="form-control" placeholder="Idade do Aluno">
          </div>

         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" name="updatedata">Atualizar</button>
        </div>
      </div>

    </div>
  </div>
  </div>




</body>

</html>
