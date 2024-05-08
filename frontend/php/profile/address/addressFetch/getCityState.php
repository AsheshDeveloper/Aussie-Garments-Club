<?php
if(isset($_POST['Postcode'])) {
    $postcode = $_POST['Postcode'];
    $url = 'https://v0.postcodeapi.com.au/suburbs/' . $postcode . '.json';

    // Fetch data from the API
    $response = file_get_contents($url);

    // Check if the response is empty or not
    if ($response === false) {
        // Error occurred while fetching data from the API
        http_response_code(500); // Internal Server Error
        echo json_encode(array("error" => "Error fetching data from the API."));
    } else {
        // Decode the JSON response
        $data = json_decode($response, true);

        // Check if the JSON decoding was successful
        if ($data === null) {
            // Error occurred while decoding JSON
            http_response_code(500); // Internal Server Error
            echo json_encode(array("error" => "Error decoding JSON data."));
        } else {
            // Data fetched successfully, return it
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }
} else {
    // No postcode provided in the request
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Postcode parameter missing."));
}
?>