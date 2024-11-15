<?php
require 'vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

// Set up the database connection
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Fetch the subscription data for a specific user (replace with actual user logic)
$stmt = $pdo->query("SELECT endpoint, p256dh, auth FROM subscriptions WHERE user_id = 1");
$subscriptionData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($subscriptionData) {
    // Create the subscription object
    $subscription = Subscription::create([
        'endpoint' => $subscriptionData['endpoint'],
        'keys' => [
            'p256dh' => $subscriptionData['p256dh'],
            'auth' => $subscriptionData['auth'],
        ],
    ]);

    // VAPID authentication details (use your VAPID public/private keys here)
    $auth = [
        'VAPID' => [
            'subject' => 'mailto:your-email@example.com',
            'publicKey' => 'BPcc8yjIRFN6p-A_YnnQRtB2VbDUPEo4kgd1qSy_UrVpuh0f3vZoEMY9iksyPuBDBfAsg1GQusKT5nb6X44oaFI', // Replace with your actual public key
            'privateKey' => '-H8v4fp_FhT_BuDnvE6W14G0T6HPd9ou1bw0rD7pF6U', // Replace with your actual private key
        ],
    ];

    $webPush = new WebPush($auth);

    // Send the notification payload
    $webPush->sendNotification(
        $subscription,
        json_encode([
            'title' => 'Database Update',
            'body' => 'There has been an update to your data!',
        ])
    );

    // Process notification results
    foreach ($webPush->flush() as $report) {
        if ($report->isSuccess()) {
            echo "Notification sent successfully.";
        } else {
            echo "Notification failed: {$report->getReason()}";
        }
    }
} else {
    echo "No subscription found for the user.";
}
?>
