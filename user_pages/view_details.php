<?PHP

include_once("config/database.php");

echo "<h1><br/>THIS IS THE VIEW DETAILS PAGE</h1><br/>";

$sql = 'SELECT FROM user * WHERE uid="'.$_POST['logged_uid'].'"';
$result = run_query($sql);

$output = '<h2 style="text-align:center">User Profile</h2>';
foreach ($result as $row){
        $output .= '<div class="card"><h1>'.$row["uid"].'</h1><p class="fullname">'.$row["fname"].' '.$row["lname"].'</p><p>'.$row["email"].'</p><p><button>Edit</button></p></div>';
}

echo $output;

?>