<?PHP

include_once("server.php");

include_once("create_database.php");

include_once("database.php");

$db_conn->query("SHOW DATABASES");

//header('Location: ../index.php');

?>