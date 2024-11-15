<?php
$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
// print_r($contact_r);
?>


<footer>
	<div class="container grid">
		<div class="box">
			<a href="https://maps.app.goo.gl/gZSm5HRjX7wnhuQ38" target="_blank">
				<img src="../map.png" alt="Map Location">
			</a>
		</div>

		<div class="box">
			<h2>Links</h2>
			<ul>
				<li><a href="../home/home.php">Home</a></li>
				<li><a href="../gallery/gallery.php">Gallery</a></li>
				<li><a href="../room/room.php">Room</a></li>
				<li><a href="../explore/explore.php">Explore</a></li>
			</ul>
		</div>

		<div class="box">
			<h2>Contact Us</h2>
			<p>SHRI LAKSHMI NARAYANA LODGE</p>
			<i class="fa fa-location-dot"></i>
			<label><?php echo $contact_r['address'] ?></label><br>
			<?php
        if ($contact_r['pn1'] != '') {
            echo<<<data
                <i class="fa fa-phone"></i>
      <label> +$contact_r[pn1] <br> +$contact_r[pn2] </label><br>
    data;
        }
?>

		</div>
	</div>
</footer>

<div class="legal">
	<p class="container">Copyright &copy; 2022 Copyright Holder All Rights Reserved.</p>
</div>

<style>
	footer {
		width: 100%;
		height: 70%;
		background: #282834;
		color: #ffffff;
		padding: 2% 0 0 0;
	}

	footer .grid {
		display: grid;
		grid-template-columns: 6fr 3fr 3fr;
	}

	footer p {
		color: #b6b7b9;
		font-size: 15px;
		line-height: 25px;
	}

	footer .icon i {
		margin: 20px 20px 20px 0;
		color: #b6b7b9;
	}

	footer h2 {
		color: #fff;
		margin-bottom: 10px;
	}

	footer li {
		margin-bottom: 20px;
	}

	footer i {
		color: #7fc142;
		margin: 20px 0;
		margin-right: 20px;
	}

	footer label {
		margin: 20px 0;
	}

	.legal {
		padding: 15px 0;
		background: #282834;
		color: #b6b7b9;
		border-top: 1px solid rgba(255, 255, 255, 0.2);
	}

	footer img {
		max-width: 80%;
		height: auto;
		margin-bottom: 20px;
	}

	@media only screen and (max-width: 768px) {
		footer .grid {
			grid-template-columns: repeat(1, 1fr);
		}

		footer img {
			max-width: 60px;
			margin-bottom: 15px;
		}
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">