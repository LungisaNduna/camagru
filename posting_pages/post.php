<?php
    session_start();
    include_once('../config/database.php');

    $imgURL = ($_POST['imageURL']);
    $mess = $_POST['postmessage'];
    $user_uid = $_SESSION["logged_uid"];

    echo "session has $user_uid logged in<br/>";

    $sql = "INSERT INTO `posts` (`user_uid`, `post_data`, `post_mess`)";
    $sql .= " VALUES ('$user_uid', '$imgURL', '$mess')";

    echo "about to execute $sql<br/>";
    $db_conn->exec($sql);

    echo "Have executed the sql";
    header('Location: ../index.php');

?>