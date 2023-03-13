<?php



echo $id        = $_POST["idUsuario"];
echo $nome      = $_POST["nomeUsuario"];
echo $email     = $_POST["emailUsuario"];
echo $login     = $_POST['loginUsuario'];
echo $senha     = $_POST["senhaUsuario"];

// Criando conexão
include("./conexao/conexao.php");
$pdo = conectar();
$sql = 'UPDATE tblUsuario SET  nomeUsuario=?, loginUsuario=?, emailUsuario=? ,senhaUsuario=? WHERE idUsuario = ?';
$dados = [$nome, $email,$login,$senha,$id];
$stmt = $pdo->prepare($sql);



if ($stmt->execute($dados)) {
  echo '<script> alert("Data Updated"); </script>';
  header("Location:adm.php?pg=listar.php");
} else {
  echo '<script> alert("DEU RUIM"); </script>';
  echo "Error: " . $sql . "<br>" ;
}
?>