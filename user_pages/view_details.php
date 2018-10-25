<?PHP

require_once("config/database.php");

echo "<h1>THIS IS THE VIEW DETAILS PAGE</h1>";

$sql = 'SELECT FROM user * WHERE uid="'.$_POST['logged_uid'].'"';
$result = $db_conn->query($sql);

foreach ($result as $row){
    $output = '<h2 style="text-align:center">User Profile</h2>
                <div class="card">
                    <h1>'.$row["uid"].'</h1>
                    <p class="fullname">'.$row["fname"].' '.$row["lname"].'</p>
                    <p>'.$row["email"].'</p>
                    <p><button>Edit</button></p>
                </div>';
    echo "$output";
    }

?>