<?PHP

session_start();
include_once("../config/database.php");
include_once('user_functions.php');

$uid = $_GET['uid'];
echo "working with $uid<br/>";
$sql = 'UPDATE users SET psw="'.encrypt().'" WHERE uid="'.$uid.'"';
$db_conn->exec($sql);
echo "sql executed<br/>";
$_SESSION['logged_in'] = true;
$_SESSION['logged_uid'] = $uid;
echo "$uid has been logged in.";
header("Location: ../index.php");

?>

  <form action="reset_password.php" method="post" style="border:1px solid #ccc">
    <div class="container">
      <h1>Reset Password</h1>
      <hr>
      <label for="user_id"><b>Username</b></label>
      <input type="text" placeholder="Please enter your new password" name="psw" required>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Please repeat new password" name="re_psw" required>
        
      <div class="clearfix">
        <a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>
        <button type="submit" class="signupbtn">Sign In</button>
      </div>
    </div>
  </form>