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
    <script>

        function updateImage() {
                        
            if (document.getElementById('optDog').checked) {
                alert("dog overlay picked");
                loadOverlay("./posting_pages/overlays/dog.png", 0, 0, 20, 20);
            }
            else if (document.getElementById('optMin').checked) {
                alert("minion overlay picked");
                loadOverlay("./posting_pages/overlays/minions.png", 0, 0, 20, 20);
            }
            else if (document.getElementById('optXmas').checked) {
                alert("christmas overlay picked");
                loadOverlay("./posting_pages/overlays/christmas.png", 0, 0, 20, 20);
            }
        }

        function loadOverlay(file, xPos, yPos, width, height) {
            var canvas = document.getElementById('capture_dis');
            var context = canvas.getContext('2d');
            var olImg = new Image();

            olImg.src = file;
            alert(file);
            olImg.onload = function(ev) {
                context.drawImage(ev.target, xPos, yPos, width, height)
            }
            alert("load completed");
        }
    </script>
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