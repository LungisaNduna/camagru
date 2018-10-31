<?PHP

//create database
$sql = "CREATE DATABASE camagruDB";
if ($server_conn->exec($sql)) {
    echo "<p>Database created successfully</p><br/>";
} else {
    echo "<p>Error creating database</p><br/>";
}

//create user table
//{ user_id autonumber; user_fname, user_lname, user_uid, user_email, user_psw }
$sql = "CREATE TABLE `camagrudb`.`users` ";
$sql .= "( `user_id` INT NOT NULL AUTO_INCREMENT , ";
$sql .= "`fname` VARCHAR(50) NOT NULL , ";
$sql .= "`lname` VARCHAR(50) NOT NULL , ";
$sql .= "`uid` VARCHAR(25) NOT NULL , ";
$sql .= "`email` VARCHAR(100) NOT NULL , ";
$sql .= "`psw` VARCHAR(255) NOT NULL , ";
$sql .= "`verified` BOOLEAN NOT NULL DEFAULT FALSE , ";
$sql .= "PRIMARY KEY (`user_id`)) ENGINE = InnoDB;";

if ($server_conn->exec($sql)) {
    echo "<p>User table created successfully in camagruDB</p><br/>";
} else {
    echo "<p>Error creating User table</p><br/>";
}

//create post table
//{ post_id autonumber, post_pic, no_of_comm, post_comments, no_of_likes, post_likes }
$sql = "CREATE TABLE `camagrudb`.`posts` ( ";
$sql .= "`post_id` INT NOT NULL AUTO_INCREMENT , ";
$sql .= "`pic_src` VARCHAR(255) NOT NULL , ";
$sql .= "`comments` TEXT NULL , ";
$sql .= "`comment_count` INT NOT NULL DEFAULT '0' , ";
$sql .= "`likes` TEXT NULL , ";
$sql .= "`like_count` INT NOT NULL DEFAULT '0' , ";
$sql .= "PRIMARY KEY (`post_id`)) ENGINE = InnoDB;";

if ($server_conn->exec($sql)) {
    echo "<p>Post table created successfully in camagruDB</p><br/>";
} else {
    echo "<p>Error creating Post table</p><br/>";
}

//create overlay table
//{ overlay_id autonumber, overlay_src, }
$sql = "CREATE TABLE `camagrudb`.`overlay` ( ";
$sql .= "`overlay_id` INT NOT NULL AUTO_INCREMENT , ";
$sql .= "`overlay_src` VARCHAR(255) NOT NULL , ";
$sql .= "PRIMARY KEY (`overlay_id`)) ENGINE = InnoDB;";

if ($server_conn->exec($sql)) {
    echo "<p>Overlay table created successfully in camagruDB</p><br/>";
} else {
    echo "<p>Error creating Overlay table</p><br/>";
}

?>