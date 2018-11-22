<?php
    
    include_once("config/database.php");
    echo "<h1>THIS IS WHERE ONE CAN VIEW POSTS OR A SINGLE POST</h1>";

    //simply show a single post and it's comments.

    $postID = $_GET["post_num"];

    //unserialize the comments and place them into divs to output them
    //this outputs each comment as it is finished so as not to wait for all the comments to be processed before display
    function    list_comments($serialisedComments) {
        $comments = unserialize($serialisedComments);
        foreach ($comments as $comment) {
            $output = '<div class="commentDiv">';
            $output .= '<h5 class="commentor">'.$comment["uid"].'</h5>';
            $output .= '<p class="comment">'.$comment["comment"].'</p>';
            $output .= '</div>';
            echo $output;
        }
    }

    //grab everything about the post from the data base

    if ($_SESSION['logged_in']) {
        $firstthing = '<form action="comment" method="post">';
        $firstthing .= '<input type="text" name="new_comment" placeholder="Want to comment simply add it">';
        $firstthing .= '<input type="submit" value="Comment">';
        $firstthing .= '</form>';
    } else { 
        $firstthing = "<p id='logInNotice'>";
        $firstthing .= "You need to sign in to leave a comment. ";            
        $firstthing .= "You can sign in or up using the buttons in the top right corner";
        $firstthing .= "</p>"; 
    }
?>

<html>
    <head>

    </head>
    <body>
        <?PHP include("format/navbar.php"); ?>
        <?PHP include("format/footer.php"); ?>
        <?PHP
            
            //place picture

            echo $firstthing;

            list_comments($raw_comments);
        ?>

        


        
    </body>
</html>


