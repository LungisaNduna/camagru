<?PHP
session_start();
if (!isset($_SESSION['logged_in'])){
    $_SESSION['logged_in'] = false;
    $_SESSION['logged_uid'] = "Guest";
}
?>

<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="stylesheets/navbar.css">
        <link rel="stylesheet" href="stylesheets/footer.css">
    </head>
    <body>
        <?PHP include("format/navbar.php");
            if ($_SESSION['logged_in']){ echo "User logged in\n"; } else { echo "User not logged in\n"; }
            echo "as ".$_SESSION['user_id']."\n";

            include("format/footer.php");
        ?>
    </body>
</html>