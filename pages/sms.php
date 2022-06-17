<?php 

// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'db.php';
$obj->is_logged_in();
require_once 'vendor/twilio/sdk/src/Twilio/autoload.php';
 
use Twilio\Rest\Client;

$sid    = "AC74a7b599177dc0ad4d2d23015da480e9"; 
$token  = "8ec97ad2aadad0640a127f7113e4f253"; 
// A Twilio number you own with SMS capabilities
$twilio_number = "+19292992519";

$client = new Client($sid, $token);
$client->messages->create(
    // Where to send a text message (your cell phone?)
    '+923142147472',
    array(
        'from' => $twilio_number,
        'body' => 'I sent this message in under 10 minutes!'
    )
);
 
// print($message->sid);