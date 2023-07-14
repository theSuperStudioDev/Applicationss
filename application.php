<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $age = $_POST['age'];
    $timezone = $_POST['timezone'];
    $experience = $_POST['experience'];
    $availability = $_POST['availability'];
    $reason = $_POST['reason'];
    $strengths = $_POST['strengths'];
    $weaknesses = $_POST['weaknesses'];
    $discord = $_POST['discord'];
    $references = $_POST['references'];
    $additionalInfo = $_POST['additional-info'];

    // Create the message payload
    $message = "New Staff Application\n";
    $message .= "Username: $username\n";
    $message .= "Age: $age\n";
    $message .= "Timezone: $timezone\n";
    $message .= "Previous Staff Experience: $experience\n";
    $message .= "Availability: $availability\n";
    $message .= "Reason for Applying: $reason\n";
    $message .= "Strengths: $strengths\n";
    $message .= "Weaknesses: $weaknesses\n";
    $message .= "Discord Username: $discord\n";
    $message .= "References: $references\n";
    $message .= "Additional Information: $additionalInfo";

    // Set up the webhook URL
    $webhookUrl = 'https://discord.com/api/webhooks/1126653930781290618/JPuierXslVFedQJJH4zB_pmW-yAlvF64qJEH2yvTF7Vx0nYRW5zOQnGfu22peI3l5-or'; // Replace with your actual Discord webhook URL

    // Prepare the request data
    $data = array('content' => $message);

    // Send the request to the webhook URL
    $ch = curl_init($webhookUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Handle the response (you can customize this part based on your needs)
    if ($response === false) {
        echo 'Failed to send the staff application. Please try again later.';
    } else {
        echo 'Staff application submitted successfully.';
    }
}
?>
