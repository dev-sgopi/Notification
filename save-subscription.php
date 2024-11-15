<?php
// Set up the database connection
$pdo = new PDO('mysql:host=192.168.94.1;dbname=Hotel', 'root', 'Asus');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get the raw POST data (subscription details)
$data = json_decode(file_get_contents('php://input'), true);

// Check if the necessary data is present
if (isset($data['endpoint']) && isset($data['keys']['p256dh']) && isset($data['keys']['auth'])) {
    // Prepare SQL to insert or update the subscription data
    $stmt = $pdo->prepare("INSERT INTO subscriptions (user_id, endpoint, p256dh, auth) VALUES (:user_id, :endpoint, :p256dh, :auth)
                           ON DUPLICATE KEY UPDATE endpoint = :endpoint, p256dh = :p256dh, auth = :auth");
    $stmt->execute([
        ':user_id' => 1,  // Change to the actual user ID logic in your app
        ':endpoint' => $data['endpoint'],
        ':p256dh' => $data['keys']['p256dh'],
        ':auth' => $data['keys']['auth']
    ]);

    // Return a success message
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid subscription data']);
}
?>
