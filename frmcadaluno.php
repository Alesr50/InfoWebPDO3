<?php


   // session_cache_expire(1);
   // session_start();

if ( !isset($_SESSION['usuario'])  ) {
//Destrói
session_destroy();

//Limpa
unset ($_SESSION['usuario']);
//  unset ($_SESSION['senha']);

//Redireciona para a página de autenticação
header('location:login.html');
}





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
<script>
    function mascara(i){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

}
</script>
    <title>Formulário Cadastro</title>
</head>


<body>
    <div class="container">
        <form action="insereAluno.php" method="get">
            <p>Formulário de Cadastro de Alunos</p>
            <div class="mb-3">
                <label  class="form-label">Nome</label>
                <input type="text" name="nomeAluno" id="nome" class="form-control" placeholder="Digite seu nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpfAluno" id="cpf"  class="form-control" placeholder="Digite seu CPF" oninput="mascara(this)" maxlength="11" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Idade</label>
                <input type="number" name="idadeAluno" id="idade" class="form-control"  placeholder="Digite a idade"  min="1" required>
            </div>
           
            <button type="submit" id="button" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>