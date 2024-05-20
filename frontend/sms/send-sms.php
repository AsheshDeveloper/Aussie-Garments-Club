<?php
use Twilio\Rest\Client;
require_once "../../vendor/autoload.php";

$sid = "AC240112cb42f42b094167c7f84708bfba";
$token = "8329b5a81a5c0c15ae6738ea10482283";
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
