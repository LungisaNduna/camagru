<?PHP

session_start();
include_once("../config/database.php");
include_once('user_functions.php');

  echo "<h3>".$_POST['logged_uid']."</h3>";
    if ($_POST['logged_in'] === true) { $uid = $_POST['logged_uid']; } else {$uid = $_GET['reset_uid']; }
    echo "<p>working with $uid</p><br/>";
    $sql = 'UPDATE users SET psw="'.encrypt($_POST['new_psw']).'" WHERE uid="'.$uid.'"';
    $db_conn->exec($sql);
    echo "sql executed<br/>";
    $_SESSION['logged_in'] = true;
    $_SESSION['logged_uid'] = $uid;
    echo "$uid has been logged in.";
    free_post_data();
    echo "post cleared";
    //header("Location: ../index.php");

?>