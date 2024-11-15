<?php

// Database connection
$host = '192.168.94.1';
$username = 'root';
$password = 'Asus';
$dbname = 'Hotel';



$con = new mysqli($host, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Input sanitization function
if (!function_exists('filteration')) {
    function filteration($data)
    {
        foreach ($data as $key => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            $value = strip_tags($value);

            $data[$key] = $value;
        }
        return $data;
    }
}


if (!function_exists('selectAll')) {
    function selectAll($table)
    {
        $con = $GLOBALS['con'];
        $res = mysqli_query($con, "SELECT * FROM $table");
        return $res;
    }
}


// Function to handle select queries
if (!function_exists('select')) {
    function select($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        // Prepare the SQL query
        if ($stmt = mysqli_prepare($con, $sql)) {

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res; // Return results if successful
            } else {
                // Print detailed execution error
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select. Error: " . mysqli_stmt_error($stmt));
            }

        } else {
            // Print detailed preparation error
            die("Query cannot be prepared - Select. Error: " . mysqli_error($con));
        }
    }
}



if (!function_exists('update')) {
    function update($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        // Prepare the SQL query
        if ($stmt = mysqli_prepare($con, $sql)) {

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res; // Return results if successful
            } else {
                // Print detailed execution error
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update. Error: " . mysqli_stmt_error($stmt));
            }

        } else {
            // Print detailed preparation error
            die("Query cannot be prepared - Update. Error: " . mysqli_error($con));
        }
    }
}


if (!function_exists('insert')) {
    function insert($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        // Prepare the SQL query
        if ($stmt = mysqli_prepare($con, $sql)) {

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res; // Return results if successful
            } else {
                // Print detailed execution error
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Insert ");
            }

        } else {
            // Print detailed preparation error
            die("Query cannot be prepared - Insert");
        }
    }
}

if (!function_exists('select')) {
    function delete($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        // Prepare the SQL query
        if ($stmt = mysqli_prepare($con, $sql)) {

            // Bind the parameters
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res; // Return results if successful
            } else {
                // Print detailed execution error
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }

        } else {
            // Print detailed preparation error
            die("Query cannot be prepared - Delete");
        }
    }
}
