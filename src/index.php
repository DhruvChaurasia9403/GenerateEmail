<?php
require_once __DIR__.'functions.php';
$message ="";


// TODO: Implement the form and logic for email registration and verification
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $step = $_POST['step'] ?? '';
    $email=trim($_POST['email']??'');
    $code = trim($_POST['code'??'']);
    if($step==='request'&&filter_var($email,FILTER_VALIDATE_EMAIL)){
        $verifivationCode = generateVerificationCode();
        if(sendVerificationEmail($email,$cerificationCode)){
            $message = "Verification code sent to $email. Please check your inbox.";
        } else {
            $message = "Failed to send verification code. Please try again later.";
        }
    }
    if($step==='verify'&& $email && $code){
        if(verifyCode($email,$code)){
            registerEmail($email);
            $message = "Email $email has been successfully registered.";
        }
        else{
            $message = "Invalid verification code. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>XKCD Email Subscription</title>
    <style>
        body {
            font-family: Arial;
            max-width: 600px; 
            margin: 50px auto; 
            padding: 20px; 
            background: #f9f9f9; 
            border-radius: 10px; 
        }
        input[type="email"], input[type="text"] { 
            padding: 10px;
            width: 100%;
            margin: 10px 0;
        }
        button { 
            padding: 10px 20px;
            margin-top: 10px;
        }
        .message { 
            background: #e0f7e9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h2> Subsscribe to the comics Updates</h2>
    <?php if($message): ?>
        <div class="message"><?=htmlspecialchars($message) ?></div>
    <?php endif; ?>

<form method="POST">
    <input type="hidden" name="step" value="request">
    <label>Email:</label>
    <input type="email" name="email" required>
    <button type="submit">Get Verification Code</button>
</form>

<hr>

<form method="POST">
    <input type="hidden" name="step" value="verify">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Verification Code:</label>
    <input type="text" name="code" required>
    <button type="submit">Verify & Subscribe</button>
</form>

</body>
</html>
