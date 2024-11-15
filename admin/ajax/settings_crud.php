<?php

require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1]; // Ensure the value is an integer
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);
    $q = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?";
    $values = [$frm_data['site_title'], $frm_data['site_about'],1];
    $res = update($q, $values, 'ssi');
    echo $res;
}


if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown'] == 0) ? 1 : 0 ;
    $q = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
    $values = [$frm_data,1];
    $res = update($q, $values, 'ii');
    echo $res;
}

if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['upd_contacts'])) {
    $frm_data = filteration($_POST);

    // Corrected SQL query syntax
    $q = "UPDATE `contact_details` SET `address`=?, `gmap`=?, `pn1`=?, `pn2`=? WHERE `sr_no`=1";
    $values = [$frm_data['address'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['pn2']];
    $res = update($q, $values, 'ssss');  // Only string types since `sr_no` is already specified in the WHERE clause

    echo $res;
}

if (isset($_POST['add_member'])) {
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);

    if ($img_r == 'inv_img') {
        echo $img_r;
    } elseif ($img_r == 'inv_size') {
        echo $img_r;
    } elseif ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q = "INSERT INTO `team_details`(`name`, `picture`) VALUES (?,?)";
        $values = [$frm_data['name'],$img_r];
        $res = insert($q, $values, 'ss');
        echo $res;
    }
}

if (isset($_POST['get_members'])) {
    $res = selectAll('team_details');
    $path = ABOUT_IMG_PATH;

    while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
            <div class="col-md-2 mb-3"> 
                <div class="card text-bg-dark">
                    <img src="$path$row[picture]" class="card-img">
                    <div class="card-img-overlay text-end">
                        <button type="button" onclick="rem_member($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                        <p class="card-text text-center px-3 py-2">
                    <small>$row[name]</small>
                        </p>
                </div>
            </div>
        data;
    }

    exit; // Ensures no additional output is sent
}

if (isset($_POST['rem_member'])) {
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_member']]; // Removed the space after 'rem_member'

    $pre_q = "SELECT * FROM `team_details` WHERE `sr_no` = ?";
    $res = select($pre_q, $values, 'i');
    $img = mysqli_fetch_assoc($res);

    if ($img && deleteImage($img['picture'], ABOUT_FOLDER)) { // Added a check for $img to avoid errors if nothing is found
        $q = "DELETE FROM `team_details` WHERE `sr_no` = ?";
        $res = delete($q, $values, 'i');
        echo $res; // Echo the result or 0 if deletion fails
    } else {
        echo 0;
    }
}

