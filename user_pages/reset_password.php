<?PHP

session_start();
include_once("../config/database.php");
include_once('user_functions.php');
  
echo "<h1>RESET PASSWORD</h1>";
  //assign the variables
  if ($_SESSION['logged_in'] === true) { 
    $uid = $_SESSION['logged_uid']; 
  } else if (isset($_GET['reset_uid'])) {
    $uid = $_GET['reset_uid']; 
  }
  $newPsw = encrypt($_POST['new_psw'], $uid);
  
  echo "<p>working with $uid</p><br/>";

  //run sql to update the server
  $sql = 'UPDATE users SET psw="'.$newPsw.'" WHERE uid="'.$uid.'"';
  echo "<p>about to execute '$sql' </p><br/>";
  $db_conn->exec($sql);
  echo "sql executed<br/>";
  
  //log the person in
  $_SESSION['logged_in'] = true;
  $_SESSION['logged_uid'] = $uid;
  echo "$uid has been logged in.";
  
  //clear the post so that the data is no longer accesable.
  unset($_POST['new_psw']);
  unset($_POST['re_psw']);
  echo "post cleared";
    //header("Location: ../index.php");

?>