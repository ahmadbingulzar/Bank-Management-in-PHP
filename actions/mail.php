<?php
require '../vendor/autoload.php';

require '/var/www/html/crud/vendor/sendgrid/sendgrid/sendgrid-php.php';

use SendGrid\Mail\From;
use SendGrid\Mail\HtmlContent;
use SendGrid\Mail\Mail;
use SendGrid\Mail\PlainTextContent;
use SendGrid\Mail\Subject;
use SendGrid\Mail\To;
function my_mail($email1, $details)
{
    
    $API_KEY = "YOUR API KEY";
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("YOUR EMAIL ADDRESS", "Mango Bank Limited");
    $email->setSubject("Sending with Twilio SendGrid is Fun");
    $email->addTo($email1);
    $email->addContent("text/plain", "use this key to login $details");
    $sendgrid = new \SendGrid($API_KEY);
    if ($sendgrid->send($email) == true) {
        echo "email sent";
        return true;
    } 
    else {
        return false;
    }
}

