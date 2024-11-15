<?php 
    require 'inc/essentials.php';
   require 'inc/db_config.php';

   session_start();
   
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true))
    {
        redirect('dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="common.css">
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>
<body class="bg-light">

    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                </div> 
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
            </div>
        </form>
    </div>

    <?php
        if(isset($_POST['login'])) {
            $frm_data = filteration($_POST);

            // SQL query to select admin credentials
            $query = "SELECT * FROM `admin_card` WHERE `admin_name`=? AND `admin_pass`=?";
            $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

            // Execute the select query
            $res = select($query, $values, "ss");

            // if(mysqli_num_rows($res) > 0) {
            //     echo "Login successful!";
            // } else {
            //     echo "Invalid username or password.";
            // }
            if($res->num_rows==1){
                $row = mysqli_fetch_assoc($res);
                // session_start();
                $_SESSION['adminLogin'] = true;    
                $_SESSION['adminId'] = $row['sr_no'];
                redirect('dashboard.php');
            }else{
                alert('error', 'Login failed - Invalid Credentails!');

            }
        }
    ?>
    <?php require('inc/scripts.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- For Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> <!-- For Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>