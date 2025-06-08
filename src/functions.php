<?php

/**
 * Generate a 6-digit numeric verification code.
 */
function generateVerificationCode(): string {
    // TODO: Implement this function
    return (string)random_int(100000,999999);
}

/**
 * Send a verification code to an email.
 */
function sendVerificationEmail(string $email, string $code): bool {
    // TODO: Implement this function
    $subject = "Your Verification Code ";
    $message = "<p>Your verification code is: <strong>$code</strong></p>";
    $headers = "MIME-Version: 1.0\r\n".
                "Content-type:text/html;charset=UTF-8\r\n".
                "From: no_reply@example.com";
    $mailSent = mail($email, $subject, $message, $headers);
    if($mailSent) storeVerificationCode($email, $code);
    return $mailSent;
}    

/**
 * Register an email by storing it in a file.
 */
function registerEmail(string $email): bool {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
  //check if email already exists and saving it in emails
  $emails = file_exists($file)?file($file,FILE_IGNORE_NEW_LINES):[];
  if(!in_array($email,$emails)){
    $fp = fopen($file,"a");
    if($fp&&flock($fp,LOCK_EX)){
      fwrite($fp,"$email\n");
      fflush($fp);
      flock($fp,LOCK_UN);
      fclose($fp);
      return true;
    }
    return false;
  }
}

/**
 * Unsubscribe an email by removing it from the list.
 */
function unsubscribeEmail(string $email): bool {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
  if(!file_exists($file)) return false;
  $emails = file($file,FILE_IGNORE_NEW_LINES);
  $updatedEmails =array_filter($emails,fn($e)=>trim($e)!==trim($email));
  $fp=fopen($file,"w");
  if($fp&&flock($fp,LOCK_EX)){
    fwrite($fp,implode("\n",$updatedEmails)."\n");
    fflush($fp);
    flock($fp,LOCK_UN);
    fclose($fp);
    return true;
  }
  return false;
}

/**
 * Fetch random XKCD comic and format data as HTML.
 */
function fetchAndFormatXKCDData(): string {
    // TODO: Implement this function
    $latest = json_decode(file_get_contents('https://xkcd.com/info.0.json'),true);
    $max = $latest['num'];
    $randomId = random_int(1, $max);
    $comicData=json_decode(file_get_contents("https://xkcd.com/{$randomId}/info.0.json"),true);
    return "<h2>XKCD Comic</h2>
            <img src=\"{$comicData['img']}\" alt=\"XKCD COMIC\">
            <p><a href='https://example.com/src/unsubscribe.php' id='unsubscribe-button'>Unsubscribe!</a></p>";

}

/**
 * Send the formatted XKCD updates to registered emails.
 */
function sendXKCDUpdatesToSubscribers(): void {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
  if(!file_exists($file)) return;
  $emails =file($file,FILE_IGNORE_NEW_LINES);
  $html= fetchAndFormatXKCDData();
  foreach($emails as $email){
    $subject = "update is here ";
    $headers = "MIME-Version: 1.0\r\n".
                "Content-type:text/html;charset=UTF-8\r\n".
                "From: no_reply@example.com";
    mail(trim($email), $subject, $html, $headers);
  }  
}
//funtion to store verification code in a file , necessary for verifi
function storeVerificationCode(String $email ,String $code): bool {
  $file = __DIR__ . '/verification_codes.json';
  $data =file_exists($file)?json_decode(file_get_contents($file),true):[];
  $data[$email]=$code;
  return (bool)file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}
//this functuon verifies the code by matching 
function verifyCode($email,$code){
  $file = __DIR__.'/verification_codes.json';
  $data =file_exists($file)?json_decode(file_get_contents($file),true):[];
  return isset($data[$email])&&$data[$email]===$code;
}
