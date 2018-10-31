<?PHP

echo "<h1>SETUP</h1><br/>";

$server_name = "localhost";
$server_un = "root";
$server_psw = "password";

try {
    $server_conn = new PDO("mysql:host=$server_name", $server_un, $server_psw);
    $server_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!$server_conn)
    {
        echo 'no connection';
        exit();
    }
}
catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage() . '<br>';
    exit();
}

echo "Connected to server<br/>";

$exist = false;
$get_database_names = $server_conn->query('SHOW DATABASES');

while (($db_name = $get_database_names->fetch()) !== false) {
    if ($db_name[0] == 'camagru')
        $exist = true;
}

if ($exist) {
    echo "Database already exists<br/>";
} else {
    include_once('create_database.php');
    echo "Database created<br/>";
}

echo "setup complete<br/>";

//header('Location: ../index.php');

?>