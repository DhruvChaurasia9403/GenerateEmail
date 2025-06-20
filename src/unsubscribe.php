<?php
require_once __DIR__.'functions.php';

// TODO: Implement the form and logic for email unsubscription.
$message = "";
if(($_SERVER['REQUEST_METHOD']==='POST')){
    $email=trim($_POST['email']??'');
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        if(unsubscribeEmail($email)){
            $message="Email $email has been successfully unsubscribed.";
        } 
        else{
            $message="Failed to unsubscribe $email.";
        }
    }
    else{
        $message="Invalid email address. Please enter a valid email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unsubscribe</title>
</head>
<body>
    
</body>
</html>