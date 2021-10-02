<?php
function sendMail($text, $title, $email)
{
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: " . $email . "\r\n";
    $message = '
                <html>
                <head>
                <title>' . $title . '</title>
                </head>
                <body>
                ' . $text . '<p>Связаться со мной вы можете по email: <strong>' . $email . '</strong></p>' . '
                </body>
                </html>
                ';
    mail('ufcclubgallyamov@gmail.com', $title,  $message, $headers);
}
