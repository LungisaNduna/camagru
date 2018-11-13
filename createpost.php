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
    <link rel="stylesheet" href="stylesheets/webcam.css" />
    
</head>
<body>
    <?PHP include("format/navbar.php"); echo "<br/><br/>"; ?>
    
    <h1>THIS IS THE PAGE TO DO POSTING ON<br/></h1>
    <p>here we can use the webcam to take pictures/load a picture from the computer</p>
    <?PHP
        include("posting_pages/webcam.html");
    ?>
    <script src="posting_pages/camera.js"></script>
    <?PHP include("format/footer.php"); ?>
</body>
    <script src="posting_pages/camera.js"></script>
</html>