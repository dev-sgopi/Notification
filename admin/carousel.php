<?php
require 'inc/essentials.php';
adminLogin();
session_regenerate_id(true);
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel - Carousel</title>
	<?php require 'inc/links.php'; // Ensure this includes Bootstrap CSS ?>
</head>

<body class="bg-light">

	<!-- Admin Panel Header -->
	<?php require('inc/header.php'); ?>

	<!-- Main Content -->
	<div class="container-fluid" id="main-content">
		<div class="row">
			<div class="col-lg-10 ms-auto p-4 overflow-hidden">
				<h3 class="mb-4">CAROUSEL</h3>

                <!-- Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">Images</h5>
                    <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
                        <i class="bi bi-plus-square"></i> Add
                    </button>
                    </div>
                    <div class="row" id="carousel-data">
                    <!-- Carousel images or data will be dynamically added here -->
                    </div>
                </div>
                </div>

                <!-- Carousel Modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="carousel-modal-title" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="carousel_s_form">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" >Add Image</h5>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Picture</label>
                            <input type="file" name="carousel_picture" id="carousel_picture_inp" class="form-control shadow-sm" accept="image/*" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="carousel_image_inp" class="form-label fw-bold">Image</label>
                            <input type="file" name="carousel_picture" id="carousel_picture_inp" class="form-control shadow-sm" accept="image/*" required>
                        </div> -->
                        </div>
                        <div class="modal-footer">
                        <button type="button" onclick="carousel_picture.value=''" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>



			</div> <!-- col-lg-10 end -->
		</div> <!-- row end -->
	</div> <!-- container-fluid end -->

	<!-- Bootstrap JS and dependencies -->



	<?php require 'inc/scripts.php'; // Ensure this includes necessary scripts ?>
	<script src="scripts/carousel.js"></script>
	<!-- Include Popper.js and Bootstrap JS for Modal and Dropdown functionality -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
