<?PHP

    //set the session to empty
    $_SESSION['logged_in'] = false;
    $_SESSION['user_id'] = "Guest";

    //go back to the index page
    header('Location: index.php');

?>