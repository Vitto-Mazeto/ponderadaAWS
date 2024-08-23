<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>CrudsVitto Page</h1>
<?php

  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  VerifyCrudsTable($connection, DB_DATABASE);

  $nome = htmlentities($_POST['Nome']);
  $cruds_feitos = htmlentities($_POST['CrudsFeitos']);
  $tarefas_finalizadas = isset($_POST['TarefasFinalizadas']) ? 1 : 0;

  if (strlen($nome) || strlen($cruds_feitos)) {
    AddCrud($connection, $nome, $cruds_feitos, $tarefas_finalizadas);
  }
?>

<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>Nome</td>
      <td>CrudsFeitos</td>
      <td>TarefasFinalizadas</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="Nome" maxlength="45" size="30" />
      </td>
      <td>
        <input type="number" name="CrudsFeitos" size="10" />
      </td>
      <td>
        <input type="checkbox" name="TarefasFinalizadas" />
      </td>
      <td>
        <input type="submit" value="Add Data" />
      </td>
    </tr>
  </table>
</form>

<table border="1" cellpadding="2" cellspacing="2">
  <tr>
    <td>ID</td>
    <td>Nome</td>
    <td>CrudsFeitos</td>
    <td>TarefasFinalizadas</td>
  </tr>

<?php

$result = mysqli_query($connection, "SELECT * FROM Cruds");

while($query_data = mysqli_fetch_row($result)) {
  echo "<tr>";
  echo "<td>",$query_data[0], "</td>",
       "<td>",$query_data[1], "</td>",
       "<td>",$query_data[2], "</td>",
       "<td>",($query_data[3] ? 'Yes' : 'No'), "</td>";
  echo "</tr>";
}
?>

</table>

<?php

  mysqli_free_result($result);
  mysqli_close($connection);

?>

</body>
</html>


<?php

function AddCrud($connection, $nome, $cruds_feitos, $tarefas_finalizadas) {
   $n = mysqli_real_escape_string($connection, $nome);
   $c = mysqli_real_escape_string($connection, $cruds_feitos);
   $t = mysqli_real_escape_string($connection, $tarefas_finalizadas);

   $query = "INSERT INTO Cruds (Nome, CrudsFeitos, TarefasFinalizadas) VALUES ('$n', '$c', '$t');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding CRUD data.</p>");
}

/* Check whether the table exists and, if not, create it. */
function VerifyCrudsTable($connection, $dbName) {
  if(!TableExists("Cruds", $connection, $dbName))
  {
     $query = "CREATE TABLE Cruds (
         ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         Nome VARCHAR(45),
         CrudsFeitos INT,
         TarefasFinalizadas BOOLEAN
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
