<?PHP
  session_start();
  include_once('config/database.php');
  echo "<h1>here we change details</h1>";

  //get current details
  $sql = 'SELECT * FROM users WHERE uid="'.$_SESSION['logged_uid'].'"';
  $query = $db_conn->prepare($sql);
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);

  //generate the form
  $form = '<form action="user_pages/update.php" method="post" style="border:1px solid #ccc">';
  $form .= '<div class="container">';
  $form .= '<h1>CHange Details</h1>';
  $form .= '<p>Please change the details you wish update.</p>';
  $form .= '<hr>';
    
  $form .= '<label for="first_name"><b>First Name</b></label>';
  $form .= '<input type="text" value="'.$row["fname"].'" name="first_name" required>';
    
  $form .= '<label for="last_name"><b>Last Name</b></label>';
  $form .= '<input type="text" value="'.$row["lname"].'" name="last_name" required>';
    
  $form .= '<label for="user_id"><b>Display Name</b></label>';
  $form .= '<input type="text" value="'.$row["uid"].'" name="user_id" required>';
    
  $form .= '<label for="email"><b>Email</b></label>';
  $form .= '<input type="text" value="'.$row["email"].'" name="email" required>';
        
  $form .= '<div class="clearfix">';
  $form .= '<a href="../index.php"><button type="button" class="cancelbtn">Cancel</button></a>';
  $form .= '<button type="submit" class="signupbtn">Sign Up</button>';
  $form .= '</div>';
  $form .= '</div>';
  $form .= '</form>';

echo $form;

  ?>