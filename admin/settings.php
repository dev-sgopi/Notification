<?php
require 'inc/essentials.php';
adminLogin();
session_regenerate_id(true);
// Uncomment for debugging
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel - Settings</title>
	<?php require 'inc/links.php'; ?>
</head>

<body class="bg-light">

	<!-- Admin Panel Header -->
	<?php require 'inc/header.php'; ?>

	<!-- Main Content -->
	<div class="container-fluid" id="main-content">
		<div class="row">
			<div class="col-lg-10 ms-auto p-4 overflow-hidden">
				<h3 class="mb-4">SETTINGS</h3>

				<!-- General Settings Section -->
				<div class="card border-0 shadow mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0">General Settings</h5>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#general-s">
								<i class="bi bi-pencil-square"></i> Edit
							</button>
						</div>
						<h6 class="card-subtitle mb-2 fw-bold">Site Title</h6>
						<p class="card-text" id="site_title"></p>
						<h6 class="card-subtitle mb-2 fw-bold">About Us</h6>
						<p class="card-text" id="site_about"></p>
					</div>
				</div>

				<!-- General Settings Modal -->
				<div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
					aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<form id="general_s_form">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">General Settings</h5>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-label fw-bold">Site Title</label>
										<input type="text" name="site_title" id="site_title_inp"
											class="form-control shadow-none" required>
									</div>
									<div class="mb-3">
										<label class="form-label fw-bold">About Us</label>
										<textarea name="site_about" id="site_about_inp" class="form-control shadow-none"
											rows="6" required></textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button"
										onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about"
										class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Shutdown Settings Section -->
				<div class="card border-0 shadow mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0">Shutdown Settings</h5>
							<div class="form-check form-switch">
								<input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox"
									id="shutdown-toggle">
							</div>
						</div>
						<p class="card-text">No customers will be allowed to book hotel rooms when shutdown mode is
							turned on.</p>
					</div>
				</div>

				<!-- Contact Settings Section -->
				<div class="card border-0 shadow mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0">Contact Settings</h5>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#contacts-s">
								<i class="bi bi-pencil-square"></i> Edit
							</button>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<h6 class="card-subtitle mb-2">Address</h6>
								<p class="card-text" id="address"></p>
								<h6 class="card-subtitle mb-2">Google Map</h6>
								<p class="card-text" id="gmap"></p>
								<h6 class="card-subtitle mb-1">Phone Numbers</h6>
								<p class="card-text mb-1"><i class="bi bi-telephone-fill"></i> <span id="pn1"></span>
								</p>
								<p class="card-text"><i class="bi bi-telephone-fill"></i> <span id="pn2"></span></p>
							</div>
						</div>
					</div>
				</div>

				<!-- Contacts Modal -->
				<div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
					aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<form id="contacts_s_form">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Contact Settings</h5>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-label fw-bold">Address</label>
										<input type="text" name="address" id="address_inp"
											class="form-control shadow-none" required>
									</div>
									<div class="mb-3">
										<label class="form-label fw-bold">Google Map Link</label>
										<input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none"
											required>
									</div>
									<div class="mb-3">
										<label class="form-label fw-bold">Phone Numbers (with country code)</label>
										<div class="input-group mb-3">
											<span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
											<input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none"
												required>
										</div>
										<div class="input-group mb-3">
											<span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
											<input type="text" name="pn2" id="pn2_inp" class="form-control shadow-none">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" onclick="contacts_inp(contacts_data)"
										class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- Rooms display Section -->
				<div class="card border-0 shadow mb-4">
					<div class="card-body">
						<div class="d-flex align-items-center justify-content-between mb-3">
							<h5 class="card-title m-0">Rooms Display</h5>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#team-s">
								<i class="bi bi-plus-square"></i> Add
							</button>
						</div>

						<div class="row" id="team-data">
							
						</div>
					</div>
				</div>


				<!-- Rooms Display  Modal -->
				<div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1"
					aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog">
						<form id="team_s_form">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Room</h5>
								</div>
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-label fw-bold">name</label>
										<input type="text" name="member_name" id="member_name_inp"
											class="form-control shadow-none" required>
									</div>
									<div class="mb-3">
										<label class="form-label fw-bold">Picture</label>
										<input type="file" name="member_picture" id="member_picture_inp"
											accept="[.jpg , .png , .webp , .jpeg]" class="form-control shadow-none"
											required>

									</div>
								</div>
								<div class="modal-footer">
									<button type="button" onclick="" class=" btn text-secondary shadow-none"
										data-bs-dismiss="modal">Cancel</button>
									<button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
								</div>
							</div>
						</form>
					</div>
				</div>

		

			</div> <!-- col-lg-10 end -->
		</div> <!-- row end -->
	</div> <!-- container-fluid end -->

	<!-- Bootstrap JS and dependencies -->
	<?php require 'inc/scripts.php'; ?>
	<script src="scripts/settings.js"></script>

	</script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js">
	</script>

</body>

</html>