<?php

//frontend purpose data

define('SITE_URL', 'http://127.0.0.1/hbwebsite/');
define('ABOUT_IMG_PATH', SITE_URL. 'images/about/');
define('CAROUSEL_IMG_PATH', SITE_URL. 'images/carousel/');
define('FACILITIES_IMG_PATH', SITE_URL. 'images/facilities/');
define('ROOMS_IMG_PATH', SITE_URL. 'images/rooms/');

//backend upload process needs this data

define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/hotelproject/images/');
define('ABOUT_FOLDER', 'about/');
define('CAROUSEL_FOLDER', 'carousel/');
define('FACILITIES_FOLDER', 'facilities/');
define('ROOMS_FOLDER', 'rooms/');



function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo"<script>
            window.location.href='index.php';
        </script>";
        exit;
    }
    // session_regenerate_id(true);
}



function redirect($url)
{
    echo"
        <script>window.location.href='$url';</script>";
    exit;
}

function alert($type, $msg)
{

    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$msg</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    alert;
}

function uploadImage($image, $folder)
{
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    // Check if image MIME type is valid
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image MIME type or format
    }

    // Check if image size is greater than 2 MB
    if (($image['size'] / (1024 * 1024)) > 2) {
        return 'inv_size'; // Invalid size, greater than 2 MB
    }

    // Generate a random name for the file
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
    $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

    // Check if folder exists, if not create it
    if (!is_dir(UPLOAD_IMAGE_PATH . $folder)) {
        if (!mkdir(UPLOAD_IMAGE_PATH . $folder, 0777, true)) {
            error_log("Failed to create directory: " . UPLOAD_IMAGE_PATH . $folder);
            return 'dir_creation_failed';
        }
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($image['tmp_name'], $img_path)) {
        return $rname; // Return the random file name if upload succeeds
    } else {
        error_log("Failed to move uploaded file to $img_path. Error: " . print_r(error_get_last(), true));
        return 'upd_failed'; // Return error if the file upload fails
    }
}

function deleteImage($image, $folder)
{

    if (unlink(UPLOAD_IMAGE_PATH.$folder.$image)) {
        return true;
    } else {
        return false;
    }
}

function uploadSVGImage($image, $folder)
{
    $valid_mime = ['image/svg+xml'];
    $img_mime = $image['type'];

    // Check if image MIME type is valid
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image MIME type or format
    }

    // Check if image size is greater than 2 MB
    if (($image['size'] / (1024 * 1024)) > 1) {
        return 'inv_size'; // Invalid size, greater than 1MB
    }

    // Generate a random name for the file
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";
    $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

    // Check if folder exists, if not create it
    if (!is_dir(UPLOAD_IMAGE_PATH . $folder)) {
        if (!mkdir(UPLOAD_IMAGE_PATH . $folder, 0777, true)) {
            error_log("Failed to create directory: " . UPLOAD_IMAGE_PATH . $folder);
            return 'dir_creation_failed';
        }
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($image['tmp_name'], $img_path)) {
        return $rname; // Return the random file name if upload succeeds
    } else {
        error_log("Failed to move uploaded file to $img_path. Error: " . print_r(error_get_last(), true));
        return 'upd_failed'; // Return error if the file upload fails
    }
}
