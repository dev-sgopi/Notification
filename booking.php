<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> CONFIRM BOOKING</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="admin/common.css">
	<style>
		/* Default hidden state for helper text */
		.helper-text {
			font-size: 0.875rem; /* Small font size */
			color: #6c757d; /* Muted text color */
			margin-top: 0.25rem;
		}

		.d-none {
			display: none !important;
		}

	</style>
</head>

<body class="bg-light">


	<?php
	/*
		check room id from url is present or not
		Shutdown node is active or not
		User is logged is or not
	*/
    include 'admin/inc/db_config.php';
	include 'admin/inc/essentials.php';

	// if(!isset($_GET['id']) || $settings_r['shutdown']==true){
	// 	redirect('rooms.php');
	// }

	//filter and get room and user data

	$data = filteration($_GET);

	$room_res = select("SELECT * FROM rooms WHERE status = ? AND removed = ?", [1, 0], 'ii');


	if (mysqli_num_rows($room_res) == 0) {
	    redirect('rooms.php');
	}

	$room_data = mysqli_fetch_assoc($room_res);

	$_SESSION['room'] = [
	    "id" => $room_data['id'],
	    "name" => $room_data['name'],
	    "price" => $room_data['price'],
	    "payment" => null,
	    "available" => false,
	];

	// exit;
	?>
	<div class="container">
		<div class="row">

			<div class="col-12 my-5 px-4">
				<h2 class="fw-bold">CONFIRM BOOKING</h2>
				<div style="font-size: 14px;">
					<a href="index.php" class="text-secondary text-decoration-none">HOME</a>
					<span class="text-secondary">></span>
					<a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
					<span class="text-secondary">></span>
					<a href="#" class="text-secondary text-decoration-none">CONFIRM</a>
				</div>
			</div>

			<div class="col-lg-7 col-md-12 px-4">
				<?php

					$room_thumb = "path/to/default_thumbnail.jpg"; // Default image path
					$thumb_q = $con->query("SELECT * FROM room_images WHERE room_id='{$room_data['id']}' AND thumb = '1'");

					if ($thumb_q->num_rows > 0) {
						$thumb_res = $thumb_q->fetch_assoc();
						$room_thumb = "path/to/images/{$thumb_res['image']}"; // Update with the correct path to images
					}

					echo <<<data
								<div class="card p-3 shadow-sm rounded">
									<img src="$room_thumb" class="img-fluid rounded">
									<h5>$room_data[name]</h5>
									<h6>₹$room_data[price] per night </h6>		
								</div>
							data;
					session_start(); // Start the session if not already started

				?>

			</div>

			<div class="col-lg-5 col-md-12 px-4">
				<div class="card mb-4 border-0 shadow-sn rounded-3">
					<div class="card-body">
						<form action="#" id="booking_form" autocomplete="off">
							<h6 class="mb-3">BOOKING DETAILS</h6>
							<div class="row">
								<div class="col-md-6 mb-3">
									<!-- Full Name Field -->
									<label  for="full_name" class="form-label">Name</label>
									<input  id="full_name" 
											name="full_name"  
											type="text" 
											placeholder="Enter your Full Name"
											class="form-control shadow-none" 
											autocomplete="name"
											onfocus="showHelperText('name_helper')"
                            				onblur="hideHelperText('name_helper')"
											required>
									<small id="name_helper" class="helper-text d-none">Your full name as per ID.</small>

								</div>
								 <!-- Mobile Number Field -->
								<div class="col-md-6 mb-3">
									<label  for="phone_number" class="form-label">Mobile Number</label>
									<input 
										id="phone_number"
										name="phone_number" 
										type="tel"
										pattern="[0-9]{10}"
										placeholder="e.g., 9876543210"
										class="form-control shadow-none" 
										autocomplete="tel"
										onfocus="showHelperText('phone_helper')"
                            			onblur="hideHelperText('phone_helper')"
										required>
										<small id="phone_helper" class="helper-text d-none">Enter 10-digit mobile number without country code.</small>
								</div>
								<!-- Aadhar Card Number Field -->
								<div class="col-md-12 mb-3">
									<label for="aadhar_number" class="form-label">Aadhar Card Number</label>
									<input 
										id="aadhar_number"
										name="aadhar_number"
										type="text"
										pattern="[0-9]{12}"
										placeholder="Enter your 12-digit Aadhar Number"
										required
										autocomplete="off"
										onfocus="showHelperText('aadhar_helper')"
                            			onblur="hideHelperText('aadhar_helper')"
										class="form-control shadow-none" required>
										<small id="aadhar_helper" class="helper-text d-none">Your Aadhar number is required for verification.</small>
                    				</div>
								</div>
								<!-- Address Field -->
								<div class="col-md-12 mb-3">
									<label for="address" class="form-label">Address</label>
									<input
										id="address" 
										name="address"
										type="text"
										placeholder="Enter your address"
										autocomplete="street-address"
										onfocus="showHelperText('address_helper')"
                            			onblur="hideHelperText('address_helper')"
										class="form-control shadow-none" required>
										<small id="address_helper" class="helper-text d-none">Provide your complete address for confirmation.</small>
								</div>

								<!-- Number of Rooms Field -->
								<div class="col-md-12 mb-3">
									<label for="number_of_rooms" class="form-label">Number of Rooms</label>
									<input 
										id="number_of_rooms"
										name="number_of_rooms" 
										type="number"
										min="1" 
										value="1"
										class="form-control shadow-none" 
										required 
										onfocus="showHelperText('rooms_helper')"
										onblur="hideHelperText('rooms_helper')">
									<small id="rooms_helper" class="helper-text d-none">How many rooms would you like to book?</small>
								</div>

								<!-- Number of Persons (Males, Females, Children) -->
								<div class="col-md-12 mb-3">
									<label for="number_of_persons" class="form-label">Number of Persons</label>
									<div class="row">
										<!-- Number of Males -->
										<div class="col-md-4 mb-3">
											<label for="males" class="form-label">Males</label>
											<input 
												id="males"
												name="males" 
												type="number" 
												min="0" 
												value="0"
												class="form-control shadow-none"
												oninput="updateTotal()" 
												required>
										</div>
										<!-- Number of Females -->
										<div class="col-md-4 mb-3">
											<label for="females" class="form-label">Females</label>
											<input 
												id="females"
												name="females" 
												type="number" 
												min="0" 
												value="0"
												class="form-control shadow-none" 
												oninput="updateTotal()"
												required>
										</div>
										<!-- Number of Children -->
										<div class="col-md-4 mb-3">
											<label for="children" class="form-label">Children</label>
											<input 
												id="children"
												name="children" 
												type="number" 
												min="0" 
												value="0"
												oninput="updateTotal()"
												class="form-control shadow-none">
										</div>
									</div>
									 <!-- Total Number of Persons (Disabled) -->
									<div class="col-md-12 mb-3">
										<label for="total_persons" class="form-label">Total Number of Persons</label>
										<input 
											id="total_persons"
											name="total_persons" 
											type="number" 
											value="0"
											class="form-control shadow-none" 
											disabled>
									</div>
								</div>

								<!-- Check-in date field -->
								<div class="col-md-6 mb-3">
									<label for="checkin-date" class="form-label">Check-in</label>
									<!--
									<input name="checkin"  onchange="check_availability()" type="date"
										class="form-control shadow-none" required>
									-->
										
									<input 
										id="checkin_date"
										name="checkin" type="date"
										class="form-control shadow-none"
										min="<?php echo date('Y-m-d'); ?>"
										required>
								</div>

								<!-- Check-out the date field -->
								<div class="col-md-6 mb-3">
									<label for="checkout-date" class="form-label">Check-out</label>
									<!--
									<input name="checkout" onchange="check_availability()" type="date"
										class="form-control shadow-none" required>
									-->
									<input
										id="checkout-date" 
										name="checkout" type="date"
										class="form-control shadow-none" 
										min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
								</div>
								 <!-- Loader and Information Messages -->
								<div class="col-12">
									<div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
										<span class="visually-hidden">Loading...</span>
									</div>
								</div>
								<div class="col-12">
								<div id="pay_info" class="mb-3 text-danger">Please provide check-in and check-out dates.</div>
									<button 
										type="submit" 
										name="pay_now"
										class="btn w-100 text-white custom-bg shadow-none mb-1 "> 
										<!-- initially make the button disabled to prevent premature submissions.
										 Enable dynamically via JavaScript once availability is confirmed  -->
										Book Now
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>



		</div>
	</div>
<!-- UI enhance -->
	<script>
		function showHelperText(helperId) {
			const helperText = document.getElementById(helperId);
			if (helperText) {
				helperText.classList.remove('d-none');
			}
		}

		function hideHelperText(helperId) {
			const helperText = document.getElementById(helperId);
			if (helperText) {
				helperText.classList.add('d-none');
			}
		}

		function updateTotal() {
			var males = parseInt(document.getElementById('males').value) || 0;
			var females = parseInt(document.getElementById('females').value) || 0;
			var children = parseInt(document.getElementById('children').value) || 0;
			var total = males + females + children;
			
			document.getElementById('total_persons').value = total;
    }

	</script>

	<!-- Backend logic -->
	<script>
				// Get form elements
		const bookingForm = document.getElementById('booking_form');
		const infoLoader = document.getElementById('info_loader');
		const payInfo = document.getElementById('pay_info');
		const payButton = bookingForm.elements['pay_now'];

		// Hide initial pay info and loader
		payInfo.classList.add('d-none');
		infoLoader.classList.add('d-none');

		// Function to submit the form data
		function submitBookingData() {
			// Collect the form data
			let formData = new FormData(bookingForm);

			// Disable the pay button during submission
			payButton.setAttribute('disabled', true);

			// Show loader while processing the form
			infoLoader.classList.remove('d-none');

			// Create a new XMLHttpRequest to send data to the server
			let xhr = new XMLHttpRequest();
			xhr.open("POST", "confirm_booking.php", true);

			xhr.onload = function () {
				if (xhr.status === 200) {
					// Success: Display server response (booking confirmation message)
					payInfo.innerHTML = xhr.responseText;
					payInfo.classList.remove('d-none');
					payInfo.classList.replace('text-danger', 'text-dark'); // Change text color to dark for success
				} else {
					// Error: Show failure message
					payInfo.innerHTML = "Booking failed. Please try again.";
					payInfo.classList.remove('d-none');
					payInfo.classList.replace('text-dark', 'text-danger'); // Change text color to red for error
				}

				// Hide loader after processing
				infoLoader.classList.add('d-none');

				// Enable the pay button again after the response
				payButton.removeAttribute('disabled');
			};

			// Send the form data
			xhr.send(formData);
		}

		// Add event listener for form submission
		bookingForm.addEventListener('submit', function (e) {
			e.preventDefault(); // Prevent default form submission
			submitBookingData(); // Call the function to handle the form submission
		});

	</script>




	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
			integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
	</script>
</body>

</html>