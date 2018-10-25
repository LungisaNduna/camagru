<?PHP
session_start();
echo "<h1>THIS IS THE SIGN IN PAGE</h1>";

include_once("../config/database.php");
include("../user_pages/user_functions.php");

$attempted_id = $_POST['user_id'];
$attempted_psw = $_POST['psw'];

echo "We are trying to login with $attempted_id and $attempted_psw<br/>";

if (!uid_psw_match($db_conn, $attempted_id, $attempted_psw)) {
    header("Location: ../user_page.php?user_action=2&alert=7");
} else if (!isverified($db_conn, $attempted_id)) {
    header("Location: ../user_page.php?user_action=2&alert=5");
} else {
    $_SESSION['logged_in'] = true;
    $_SESSION['logged_uid'] = $attempted_id;
    header("Location: ../index.php");
}
?>