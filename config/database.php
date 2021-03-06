<?PHP

$DB_DSN = "mysql:host=localhost;dbname=camagruDB";
$DB_USER = "root";
$DB_PASSWORD = "password";

$db_conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function run_query($query) {
    $db_conn->prepare($query);
    $statement = $query->execute();

    if (explode(' ', $query)[0] == 'SELECT') {
        $data = $statement->fetchAll();
		return $data;
    }
}
?>