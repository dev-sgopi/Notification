<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel - Room Details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">

	
       <?php
	   include 'admin/inc/db_config.php';
		if(!isset($_GET['id'])){
			redirect('rooms.php');
		}

		$data = filteration($_GET);
		
		$room_res = select("SELECT * FROM `rooms` WHERE `status` = ? AND `removed` = ?", [1, 0], 'ii');

		
		if(mysqli_num_rows($room_res)==0){
			redirect('rooms.php');
		}

		$room_data = mysqli_fetch_assoc($room_res);

	    ?>
	   
	




	<div class="container">
		<div class="row">

			<div class="col-12 my-5 px-4">
				<h2 class="fw-bold"><?php echo $room_data['name']?></h2>
				<div style="font-size: 14px;">
					<a href="index.php" class="text-secondary text-decoration-none">HOME</a>
					<span class="text-secondary">></span>
					<a href="room.php" class="text-secondary text-decoration-none">ROOMS</a>
				</div>
			</div>
			
			<div class="col-lg-7 col-md-12 px-4">
				<div id="roomCarousel" class="carousel slide">
					<div class="carousel-inner">
					<?php 
							include 'admin/inc/essentials.php';
						    $room_img = ROOMS_IMG_PATH."thumbnail.jpg"; // Default image path
						    $img_q = mysqli_query($con,"SELECT * FROM `room_images`
						        WHERE `room_id`='{$room_data['id']}'");

						    if (mysqli_num_rows($img_q) > 0) {
								$active_class = 'active';
						        while($img_res = mysqli_fetch_assoc($img_q))
								{
									echo"
										<div class='carousel-item $active_class'>
											<img src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block' w-100 rounded' >
										</div>
									";
									$active_class = '';
								};

								
						        // $room_thumb = ROOMS_IMG_PATH.$img_res['image']; // Update with the correct path to images
						    }else{
								echo"<div class='carousel-item active'>
									<img src='$room_img' class='d-block' w-100'>
								</div>";
							}
					?>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>

			<div class="col-lg-5 col-md-12 px-4">
				<div class="card mb-4 border-0 shadow-sn rounded-3">
					<div class="card-body">
						<?php
							echo<<<price
								<h4>₹$room_data[price] per night</h4>
							price;


							echo<<<rating
								<div class="mb-3">
									<i class="bi bi-star-fill text-warning"></i>
									<i class="bi bi-star-fill text-warning"></i>
									<i class="bi bi-star-fill text-warning"></i>
									<i class="bi bi-star-fill text-warning"></i>
								</div>
							rating;

							$fea_q =mysqli_query($con,"SELECT f.name FROM `features` f
					        	INNER JOIN `room_features` rfea ON f.id = rfea.features_id
							    WHERE rfea.room_id = '{$room_data['id']}'");
			
							$features_data = "";
							while ($fea_row = mysqli_fetch_assoc($fea_q)) {
							    $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>{$fea_row['name']}</span> ";
							}

							echo<<<features
								<div class=" mb-3">
									<h6 class="mb-1"> Features</h6>
									$features_data
								</div>

							features;

							$fac_q = mysqli_query($con,"SELECT f.name FROM `facilities` f
								INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
								WHERE rfac.room_id = '{$room_data['id']}'");

							$facilities_data = "";
							while ($fac_row = mysqli_fetch_assoc($fac_q)) {
								$facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>{$fac_row['name']}</span> ";
							}

							echo<<<facilities
								<div class=" mb-3">
									<h6 class="mb-1"> Facility</h6>
									$facilities_data
								</div>

							facilities;

							echo<<<guests
								<div class="guests">
									<h6 class="mb-1">Guests</h6>
									<span class="badge rounded-pill bg-light text-dark text-wrap">
										$room_data[adult] Adults
									</span>
									<span class="badge rounded-pill bg-light text-dark text-wrap">
										$room_data[children] Children
									</span>
								</div>
							guests;

							echo<<<area
								<div class=" mb-3">
									<h6 class="mb-1"> Area</h6>
									<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>

										$room_data[area]sq. ft.
									</span>
								</div>
							area;

							echo<<<book
								<a href="#" class="btn  w-100 bg-dark text-white custom-bg shadow-none mb-2">Book Now</a>
							book;
						?>
					</div>
				</div>
			</div>

			<!-- Room Cards Section -->
			<div class="col-12 at-4 px-4">
				<div class="mb-5">
					<h5>Description</h5>
					<p>
					<?php echo $room_data['description'] ?>
					</p>
				</div>

				<div>
					<h5 class="mb-3">Reviews & Ratings</h5>
					<div>
						<div class="profile d-flex align-items-center mb-2">
						<img src="images/features/star.svg" width="30px">
						· <h6 class="m−0· ms-2">Random user1</h6>
						</div>
						<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit
						Id nemo excepturi, incidunt qui libero at omnis iure
						magni tempora ea.
						</p>
						<div class="rating">
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						<i class="bi bi-star-fill text-warning"></i>
						</div>
					</div>
				</div>
				

			</div>

		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
	</script>
</body>

</html>