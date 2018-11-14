<?PHP

$footer = '<div class="footer">';
if ($_SESSION['logged_in'])
    $footer .= '<a href="createpost.php" id="createpost_link" style="float: left">new post</a>';
else
    $footer .= '<p style="float: left">Please sign in to post</p>';
$footer .= '</div>';

echo $footer;

if (isset($_GET['alert'])) {
    $alert = "<script>alert('";
    switch ($_GET['alert']) {
        case 1:
        $alert .= "Sorry but the passwords do not match.";
        break;
        case 2:
        $alert .= "Invalid email address format.";
        break;
        case 3:
        $alert .= "Sorry but somebody else is already using that email address for our app.";
        break;
        case 4:
        $alert .= "Sorry but somebody is already using that display name for our app.";
        break;
        case 5:
        $alert .= "please verify your account with the link email to you.";
        break;
        case 6:
        $alert .= "We have sent you an email to complete the sign up process.";
        break;
        case 7:
        $alert .= "The Username and password are incorrect";
        break;
    }
    $alert .= "')</script>";
    echo $alert;
}

?>