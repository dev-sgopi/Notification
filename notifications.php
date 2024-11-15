<?php
require 'vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

// Fetch pending notifications from the queue
$pdo = new PDO('mysql:host=192.168.94.1;dbname=Hotel', 'root', 'Asus');
$stmt = $pdo->query("SELECT nq.id, s.endpoint, s.p256dh, s.auth, nq.message FROM notification_queue nq JOIN subscriptions s ON nq.user_id = s.user_id");
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$notifications) {
    exit('No notifications to send.');
}

$auth = [
    'VAPID' => [
        'subject' => 'mailto:your-email@example.com',
        'publicKey' => 'BPcc8yjIRFN6p-A_YnnQRtB2VbDUPEo4kgd1qSy_UrVpuh0f3vZoEMY9iksyPuBDBfAsg1GQusKT5nb6X44oaFI',
        'privateKey' => '-H8v4fp_FhT_BuDnvE6W14G0T6HPd9ou1bw0rD7pF6U',
    ],
];

$webPush = new WebPush($auth);

foreach ($notifications as $notification) {
    $subscription = Subscription::create([
        'endpoint' => $notification['endpoint'],
        'keys' => [
            'p256dh' => $notification['p256dh'],
            'auth' => $notification['auth'],
        ],
    ]);

    $webPush->sendNotification(
        $subscription,
        json_encode(['title' => 'Notification Title', 'body' => $notification['message']])
    );

    // Remove processed notification from the queue
    $pdo->prepare("DELETE FROM notification_queue WHERE id = ?")->execute([$notification['id']]);
}

// Flush notifications
foreach ($webPush->flush() as $report) {
    if ($report->isSuccess()) {
        echo "Notification sent successfully.";
    } else {
        echo "Notification failed: {$report->getReason()}";
    }
}
