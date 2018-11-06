<?PHP

function    encrypt($raw_psw, $uid) {
    return hash_hmac('whirlpool', $raw_psw, $uid);
}

function    already_exists($conn, $field, $data) {

    $count = 0;
    echo "running already exists <br/>";
    $query = $conn->prepare("SELECT * FROM users WHERE $field = '$data'");
    $query->execute();
    if( $query->rowCount() > 0 )
        return true;
    else
        return false;
}

function    send_email($to, $subject, $message) {
    $header = "From: Camagru <no-reply@camagru.co.za>\r\n";
    $header .= "Content-type: text/html\r\n";
    echo "called send_mail() about to send the mail<br/>";
    mail($to, $subject, $message, $header);
}

function    uid_psw_match($conn, $uid, $psw) {
    $query = $conn->prepare('SELECT * FROM users WHERE uid="'.$uid.'" AND psw="'.encrypt($psw, $uid).'"');
    $query->execute();
    if ($query->rowCount() == 1) {
        echo "found a match<br/>";
        return true;
    } else {
        echo "didn't find a match<br/>";
        return false;
    }
}

function    isverified($conn, $uid) {
    $query = $conn->prepare('SELECT * FROM users WHERE uid="'.$uid.'" AND verified=1');
    $query->execute();
    if ($query->rowCount() == 1) {
        echo "account verified<br/>";
        return true;
    } else {
        echo "account not verified<br/>";
        return false;
    }
}

function    free_post_data() {
    $logged_in_holder = $_POST['logged_in'];
    $uid_holder = $_POST['logged_uid'];
    $_POST = array();
    $_POST['logged_in'] = $logged_in_holder;
    $_POST['logged_uid'] = $uid_holder;
}

?>