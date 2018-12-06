<?PHP

include_once("database.php");
include_once("../user_pages/user_functions.php");

    //create two users
    $psw = encrypt("pass", "Lungs");
    $sql = "INSERT INTO `users` (`fname`, `lname`, `uid`, `email`, `psw`, verified)";
    $sql .= " VALUES ('Lungisa', 'Nduna', 'Lungs', 'lungisa@mail.co.za', '$psw', 1)";
    $db_conn->exec($sql);

    $sql = "INSERT INTO `users` (`fname`, `lname`, `uid`, `email`, `psw`, verified)";
    $sql .= " VALUES ('Jamie', 'Moriati', 'Angel', 'jamiemoriati@mail.co.za', '$psw', 1)";
    $db_conn->exec($sql);

?>