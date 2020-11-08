<?php
require_once 'app/include/database.php';
require_once 'app/include/functions.php';
if(isset($_POST['email']))
{
    $email = trim($_POST['email']);
    $insert_result = insert_subscriber($email);

    $header = 'Location: /?substibe=';
    $header .= $insert_result;

    header($header);
}
else
{
    header('Location: /');
}
?>