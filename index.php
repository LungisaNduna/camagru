<?PHP
    session_start();
    if (!isset($_SESSION['logged_in'])){
        $_SESSION['logged_in'] = false;
        $_SESSION['logged_uid'] = "Guest";
    }

    function creatediv($postID, $posterUID, $imgData, $imgMess, $postLikeCount, $postCommentCount) {
        $output =   '<div>';
        $output .=  '<a href="view.php?post_num='.$postID.'"><img src="" alt="" height="300" width="400"></a>';
        $output .=  '<p style="float: left;">posted by <em>'.$posterUID.'</em></p>';
        $output .=  '<p style="float: right;">has '.$postLikeCount.' likes and '.$postCommentCount.' comments</p>';
        $output .=  '<p>'.$imgMess.'</p>';
        $output .=  '</div>';
        echo $output;
    }
    //get the first 10 images from the database store in a variable

    //show 5 images at a time

    //create pages that allow the user to view the next 5 and so on
?>

<html>
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="stylesheets/base.css">
    </head>
    <body>
        <?PHP include("format/navbar.php");
            if ($_SESSION['logged_in']){ echo "User logged in\n"; } else { echo "User not logged in\n"; }
            echo "as ".$_SESSION['user_id']."\n";
            include("format/footer.php");
        ?>
    </body>
</html>