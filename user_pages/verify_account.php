<?php
    session_start();
    include_once("../config/database.php");
    include_once('user_functions.php');

    $uid = $_GET['uid'];
    echo "working with $uid<br/>";
    $sql = 'UPDATE users SET verified=1 WHERE uid="'.$uid.'"';
    $db_conn->exec($sql);
    echo "sql executed<br/>";
    $_SESSION['logged_in'] = true;
    $_SESSION['logged_uid'] = $uid;
    echo "$uid has been logged in.";
    header("Location: ../index.php");
?>