<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.css"> 
    <script type="text/javascript" charset="utf8" src="DataTables/datatables.js">
    </script>
    <script type="text/javascript" charset="utf8">

$(document).ready(function() {
             $('#myTable').dataTable();
    } );
</script>

    <title>Document</title>
</head>
<body>




<table id="myTable" class="display">
<?php


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbAula";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT idUsuario, nomeUsuario, emailUsuario FROM tblUsuario";
$result = mysqli_query($conn, $sql);





if (mysqli_num_rows($result) > 0) {
  echo "<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>        
        <th>Email</th></tr></thead>

    <tbody>";



    while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row["idUsuario"]."</td>
        <td>".$row["nomeUsuario"]."</td>
        <td>".$row["emailUsuario"]."</td>
        
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();


?>
       
        
    </tbody>
</table>
</body>
</html>