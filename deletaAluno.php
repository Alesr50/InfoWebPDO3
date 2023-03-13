<?php

$id        = (INT)$_GET["idAluno"];


include("./conexao/conexao.php");
$pdo = conectar();



$sql = 'UPDATE tblAlunos SET  ativo=0 WHERE idAluno = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if(!$stmt){
  echo 'erro na consulta: '. $conn->errno .' - '. $conn->error;
}


header("Location: Location:adm.php?pg=listarAlunos.php");
?>