<?PHP
    require_once('config/database.php');
    require_once('user_pages/user_functions.php');
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylesheets/base.css" />
    <link rel="stylesheet" href="stylesheets/sign_up.css" />
</head>
<body>
    <?PHP include("format/navbar.php"); ?>
    <?PHP

        if ($_GET['user_action'] == 1)
            include("user_pages/sign_up.html");
        else if ($_GET['user_action'] == 2)
            include("user_pages/sign_in.html");
        else if ($_GET['user_action'] == 3)
            include("user_pages/view_details.php");
        else if ($_GET['user_action'] == 4)
            include("user_pages/change_details.php");
        else if ($_GET['user_action'] == 5)
            include("user_pages/logout.php");
    ?>
    <?PHP include("format/footer.php"); ?>
</body>
</html>

