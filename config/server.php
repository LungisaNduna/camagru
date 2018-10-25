<?PHP

$server_name = "localhost";
$server_un = "root";
$server_psw = "password";

$server_conn = new PDO("mysql:host=$server_name", $server_un, $server_psw);
$server_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>