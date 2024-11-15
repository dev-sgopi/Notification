<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Room Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class ="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Filters Section -->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="filterDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <!-- Facilities Section -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Facility one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Facility two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Facility three</label>
                                </div>
                            </div>
                            <!-- Guests Section -->
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Room Cards Section -->
            <div class="col-lg-9 col-md-12 px-4">

            <?php
                include 'admin/inc/db_config.php';
                // Include the database connection
                // $con = new mysqli("localhost", "root", "", "hbwebsite");
                // if ($con->connect_error) {
                //     die("Connection failed: " . $con->connect_error);
                // }
                //  // Or define the connection directly here as shown above//LIMIT 3 ORDER BY `id` DESC

                // // Fetch room data
                $room_res = select("SELECT * FROM `rooms` WHERE `status` = ? AND `removed` =? ",[1,0],'ii');
                // $room_res->bind_param("ii", $status, $removed);

                // $status = 1;
                // $removed = 0;

                // $room_res->execute();
                // $result = $room_res->get_result();

                while ($room_data = mysqli_fetch_assoc($room_res)) {
                    // Fetch features of the room
                    $fea_q = mysqli_query($con,"SELECT f.name FROM `features` f
                        INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                        WHERE rfea.room_id = '{$room_data['id']}'");

                    $features_data = "";
                    while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                        $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$fea_row['name']}</span> ";
                    }

                    // Fetch facilities of the room
                    $fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f
                        INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
                        WHERE rfac.room_id = '{$room_data['id']}'");

                    $facilities_data = "";
                    while ($fac_row = mysqli_fetch_assoc($fea_q)) {
                        $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>{$fac_row['name']}</span> ";
                    }

                    // Get room thumbnail image
                    $room_thumb = "path/to/default_thumbnail.jpg"; // Default image path
                    $thumb_q = $con->query("SELECT * FROM `room_images`
                        WHERE `room_id`='{$room_data['id']}' AND `thumb` = '1'");
                        
                    if ($thumb_q->num_rows > 0) {
                        $thumb_res = $thumb_q->fetch_assoc();
                        $room_thumb = "path/to/images/{$thumb_res['image']}"; // Update with the correct path to images
                    }

                    // Output room card
                    echo <<<data
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="$room_thumb" class="img-fluid rounded">
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class="mb-3">$room_data[name]</h5>
                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        $features_data
                                    </div>
                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                        $facilities_data
                                    </div>
                                    <div class="guests">
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[adult] Adults
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap">
                                            $room_data[children] Children
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center d-flex flex-column">
                                    <h6 class="mb-4">₹$room_data[price] per night</h6>
                                    <a href="confirm_booking.php" class="btn btn-sm w-100 bg-dark text-white custom-bg shadow-none mb-2">Book Now</a>
                                    <a href="room_details.php?id=<?php echo $room_data[id]; ?>" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>

                                </div>
                            </div>
                        </div>
                    data;
                }
                ?>


                
                
            </div>

        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
