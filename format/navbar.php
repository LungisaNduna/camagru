<?PHP
session_start();
$navbar = '<div class="navbar">';

if ($_SESSION['logged_in'] === false) {
    $navbar .= '<a href="user_page.php?user_action=1">Sign Up</a>';
    $navbar .= '<a href="user_page.php?user_action=2">Sign In</a>';
}
else {
    $user_name = $_SESSION['logged_uid'];
    $navbar .= '<a href="user_page.php?user_action=5">Log out</a>';
    $navbar .= '<a href="user_page.php?user_action=3">'.$user_name.'</a>';
}

$navbar .= '<a href="index.php" style="float: left; padding: 0.5vw 0.5vw;"><img id="logo" src="stylesheets/logo.png"></a>';
$navbar .= '</div>';

echo $navbar;

?>