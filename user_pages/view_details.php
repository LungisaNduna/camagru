<?PHP

include_once("config/database.php");

echo "<h1><br/>THIS IS THE VIEW DETAILS PAGE</h1><br/>";

//get username
$user = $_SESSION['logged_uid'];
echo "<p>working with $user</p><br/>";

//get remaining details
$sql = 'SELECT FROM user * WHERE uid="'.$user.'"';
$query = $db_conn->prepare($sql);
$query->execute($user);
echo "<p>ran '$sql' query</p>";

//output details in card
$output = '<h2 style="text-align:center">User Profile</h2>';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $output .= '<div class="card"><h1>'.$row["uid"].'</h1><p class="fullname">'.$row["fname"].' '.$row["lname"].'</p><p>'.$row["email"].'</p><p><button>Edit</button></p></div>';
}

echo $output;

?>