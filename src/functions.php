<?php

/**
 * Generate a 6-digit numeric verification code.
 */
function generateVerificationCode(): string {
    // TODO: Implement this function
    return random(100000,999999);
}

/**
 * Send a verification code to an email.
 */
function sendVerificationEmail(string $email, string $code): bool {
    // TODO: Implement this function
    $subject = "Your Verification Code ";
    $message = "<p>Your verification code is: <strong> $code </strong></p>";
    $headers = "MIME-Version: 1.0\r\n".
                "Content-type:text/html;charset=UTF-8\r\n" .
                "From: no_reply@example.com";
    mail($email, $subject, $message, $headers);
    storeVerificationCode($email, $code);
}    

/**
 * Register an email by storing it in a file.
 */
function registerEmail(string $email): bool {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
}

/**
 * Unsubscribe an email by removing it from the list.
 */
function unsubscribeEmail(string $email): bool {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
}

/**
 * Fetch random XKCD comic and format data as HTML.
 */
function fetchAndFormatXKCDData(): string {
    // TODO: Implement this function
}

/**
 * Send the formatted XKCD updates to registered emails.
 */
function sendXKCDUpdatesToSubscribers(): void {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
}
