<?PHP

include_once("config/database.php");

echo "<h1><br/>THIS IS THE VIEW DETAILS PAGE</h1><br/>";
$user = $_POST['logged_in'];
echo "<p>working with $user</p><br/>";
$sql = 'SELECT FROM user * WHERE uid="?"';
$query = $db_conn->prepare($sql);
$query->execute($user);
echo "<p>ran '$sql' query</p>";

echo "<p>check</p>";

$output = '<h2 style="text-align:center">User Profile</h2>';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $output .= '<div class="card"><h1>'.$row["uid"].'</h1><p class="fullname">'.$row["fname"].' '.$row["lname"].'</p><p>'.$row["email"].'</p><p><button>Edit</button></p></div>';
}

echo $output;

?>