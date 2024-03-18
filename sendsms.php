<?php
use Twilio\Rest\Client;
require_once "vendor/autoload.php";

$sid = "AC240112cb42f42b094167c7f84708bfba";
$token = "a8ef0f30178ddd138369555841d03a9f";
$twilio = new Client($sid, $token);
print($twilio);
$message = $twilio->messages
    ->create("+9779823226555", // to
        [
            "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
            "from" => "+15746756752"
        ]
    );

print($message->sid);