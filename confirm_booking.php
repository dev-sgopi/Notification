<?php
// Include database connection
include 'admin/inc/db_config.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect form data
    $full_name = $_POST['full_name'];
    $phone_number = $_POST['phone_number'];
    $aadhar_number = $_POST['aadhar_number'];
    $address = $_POST['address'];
    $number_of_rooms = $_POST['number_of_rooms'];
    $number_of_males = $_POST['males'];
    $number_of_females = $_POST['females'];
    $number_of_children = $_POST['children'];
    $total_no_members = $number_of_males + $number_of_females + $number_of_children;
    $check_in = $_POST['checkin'];
    $check_out = $_POST['checkout'];


    // Validate data (you can add more validation as needed)
    if (empty($full_name) || empty($phone_number) || empty($aadhar_number) || empty($address) || empty($total_no_members) || empty($check_in) || empty($check_out)) {
        echo "Please fill in all required fields.";
        exit;
    }

    // Prepare SQL statement to insert the booking data
    $stmt = $con->prepare("INSERT INTO bookings (full_name, phone_number, aadhar_number, address, number_of_rooms, number_of_males, number_of_females, number_of_children,total_no_members, check_in, check_out) VALUES (?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiiiiiss", $full_name, $phone_number, $aadhar_number, $address, $number_of_rooms, $number_of_males, $number_of_females, $number_of_children,$total_no_members, $check_in, $check_out);

    // Execute the query
    if ($stmt->execute()) {
        // Return a success message
        echo <<< message_content
                <h3 style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">Booking confirmed successfully!</h3>
            message_content;
    } else {
        // Error handling
        echo <<< message_content
                <h3 style="background-color: #d41326; color: white; border: none; padding: 10px 20px; font-size: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease;">"Error: " . $stmt->error;</h3>
            message_content;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
