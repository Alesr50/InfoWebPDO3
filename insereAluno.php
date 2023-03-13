<?php


$nome=$_GET['nomeAluno'];
$cpf=$_GET['cpfAluno'];
$idade=$_GET['idadeAluno'];
//$email=$_GET['email'];

// Criando conexão
include("./conexao/conexao.php");
    $pdo = conectar();

$sql = "INSERT INTO tblalunos(nomealuno,cpfAluno, idadeAluno)
VALUES (?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $cpf);
$stmt->bindParam(3, $idade);




if ($stmt->execute()) {
  echo "Registro Cadastrado";
  header("Location:adm.php?pg=listarAlunos.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
