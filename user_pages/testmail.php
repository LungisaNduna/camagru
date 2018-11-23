<?PHP

function    send_email($to, $subject, $message) {
    $header = "From: Camagru <no-reply@camagru.co.za>\r\n";
    $header .= "Content-type: text/html\r\n";
    echo "called send_mail() about to send the mail<br/>";
    mail($to, $subject, $message, $header);
}

send_email("llanga@mailinator.com", "Subject", "<h1>this is a message</h1>");

echo "mail sent";
?>