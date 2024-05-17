<?php
use Twilio\Rest\Client;
require_once "../../vendor/autoload.php";

$sid = "AC240112cb42f42b094167c7f84708bfba";
$token = "b98efb15da1a63a1b5d3fcc39a1b7186";
$twilio = new Client($sid, $token);
print($twilio);
$message = $twilio->messages
    ->create("+61452483155", // to
        [
            "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
            "from" => "+15746756752"
        ]
    );
print($message->sid);
