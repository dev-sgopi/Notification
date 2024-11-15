<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="common.css">


<?php
include 'db_config.php';
$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
$settings_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [1];
$settings_r = mysqli_fetch_assoc(select($settings_q, $values, 'i'));

if($settings_r['shutdown']){
    echo<<<alertbar
        <div class='bg-danger text-center p-2 fm-bold'>
            <i class="bi bi-exclamation-triangle-fill"></i>
            Bookings are temporarily closed!
        </div>
    alertbar;
}