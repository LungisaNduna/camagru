<?PHP

include_once("config/database.php");

echo "<h1><br/>THIS IS THE VIEW DETAILS PAGE</h1><br/>";

//get username
$user = $_SESSION['logged_uid'];

//get remaining details
$sql = 'SELECT * FROM users WHERE uid="'.$user.'"';
$query = $db_conn->prepare($sql);
$query->execute();

//output details in card
$output = '<div class="band">';
//$output .= '<h2 style="text-align:center">User Profile</h2>';
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $output .= '<div class="card">';
        $output .= '<h1>'.$row["uid"].'</h1>';
        $output .= '<p class="fullname">'.$row["fname"].' '.$row["lname"].'</p>';
        $output .= '<p>'.$row["email"].'</p>';
        $output .= '<p><a href="?user_action=4" class="cardBtn" id="editBtn">Edit</a>';
        $output .= '<a href"?user_action=6" class="cardBtn" id="changePSW">Change Password</a></p>';
        $output .= '</div>';
}
$output .= '</div>';

echo $output;

?>