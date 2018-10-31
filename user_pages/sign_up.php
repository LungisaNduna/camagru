<?PHP
    include('user_functions.php');
    include_once('../config/database.php');
    echo "<h1>THIS PAGE WILL CONNECT AND REDIRECT THE PERSON</h1><br/>";
    
    //store the different componenets
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $uid = $_POST['user_id'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $re_psw = $_POST['re-psw'];

    //validate the input
        //passwords match
        if ($psw !== $re_psw) {
            header('Location: ../user_page.php?user_action=1&alert=1');
        }
        //email is an email
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../user_page.php?user_action=1&alert=2');
        }
        //email not used by another user
        else if (already_exists($db_conn, 'email', $email)) {
            header('Location: ../user_page.php?user_action=1&alert=3');
        }
        //user_id not used by another user
        else if (already_exists($db_conn, 'uid', $uid)) {
            header('Location: ../user_page.php?user_action=1&alert=4');
        }
        else {
            echo "<h3>THIS SEEMS TO BE VALID</h3>";

            //insert the data into the table
            $psw = encrypt($re_psw, $uid);
            $sql = "INSERT INTO `users` (`fname`, `lname`, `uid`, `email`, `psw`)";
            $sql .= " VALUES ('$fname', '$lname', '$uid', '$email', '$psw')";
            $db_conn->exec($sql);


            //sending the verification email
            $mail_body = "<p>Greetings <i>".$uid."</i></p>";
            $mail_body .= "<h1>Welcome to Camagru</h1>";
            $mail_body .= "<p>Thank you for joining Camagru</p>";
            $mail_body .= "<p><i>We are most excited to see what you bring to the party</i></p>";
            $mail_body .= "<p>Before you start the sharing liking and everything please click on the link below to verify your account</p>";
            $mail_body .= '<a href="http://localhost:8080/camagru/user_pages/verify_account.php?ver_uid='.$uid.'">Join Us</a><br/>';

            echo "we have inserted the account<br/>".$mail_body."<br/>";
            send_mail($email, "Account Verification", $mail_body);
            echo "<h1>email sent</h1>";
            
            //clear the post data to avoid someone grabbing the data
            unset($_POST['first_name']);
            unset($_POST['last_name']);
            unset($_POST['user_id']);
            unset($_POST['email']);
            unset($_POST['psw']);
            unset($_POST['re-psw']);

            header('Location: ../index.php?alert=6');
        }
    
    
    
?>