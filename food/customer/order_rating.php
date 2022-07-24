<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	session_start();
	include("conn.php");
	include('head.php');
	if (!isset($_SESSION["ses_id"])) {
		header("location: restricted.php");
		exit(1);
		$cusid = $_SESSION["ses_id"];
	}
	$cusid = $_SESSION["ses_id"]; //loginid
	$cust_select = "SELECT cust_id FROM tbl_customer WHERE login_id='$_SESSION[ses_id]'";
	$cust_result = mysqli_query($con, $cust_select);
	$cust_fetch = mysqli_fetch_array($cust_result);
	$custid = $cust_fetch['cust_id']; //customer id
	$odrid = $_GET['odrid'];
	?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style/main.css" rel="stylesheet">
	<link href="style/menu.css" rel="stylesheet">
	<title>Rating | Home-Foodie</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	<title>Form Reviews</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		:root {
			--yellow: #FFBD13;
			--blue: #4383FF;
			--blue-d-1: #3278FF;
			--light: #F5F5F5;
			--grey: #AAA;
			--white: #FFF;
			--shadow: 8px 8px 30px rgba(0, 0, 0, .05);
		}

		body {
			background: var(--light);
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			padding: 1rem;
		}

		.wrapper {
			background: white;
			padding: 2rem;
			max-width: 576px;
			width: 100%;
			border-radius: .75rem;
			box-shadow: var(--shadow);
			text-align: center;
		}

		.wrapper h3 {
			font-size: 1.5rem;
			font-weight: 600;
			margin-bottom: 1rem;
		}

		.rating {
			display: flex;
			justify-content: center;
			align-items: center;
			grid-gap: .5rem;
			font-size: 2rem;
			color: var(--yellow);
			margin-bottom: 2rem;
		}

		.rating .star {
			cursor: pointer;
		}

		.rating .star.active {
			opacity: 0;
			animation: animate .5s calc(var(--i) * .1s) ease-in-out forwards;
		}

		@keyframes animate {
			0% {
				opacity: 0;
				transform: scale(1);
			}

			50% {
				opacity: 1;
				transform: scale(1.2);
			}

			100% {
				opacity: 1;
				transform: scale(1);
			}
		}


		.rating .star:hover {
			transform: scale(1.1);
		}

		textarea {
			width: 100%;
			background: var(--light);
			padding: 1rem;
			border-radius: .5rem;
			border: none;
			outline: none;
			resize: none;
			margin-bottom: .5rem;
		}

		.btn-group {
			display: flex;
			grid-gap: .5rem;
			align-items: center;
		}

		.btn-group .btn {
			padding: .75rem 1rem;
			border-radius: .5rem;
			border: none;
			outline: none;
			cursor: pointer;
			font-size: .875rem;
			font-weight: 500;
		}

		.btn-group .btn.submit {
			background: var(--blue);
			color: var(--white);
		}

		.btn-group .btn.submit:hover {
			background: var(--blue-d-1);
		}

		.btn-group .btn.cancel {
			background: var(--white);
			color: var(--blue);
		}

		.btn-group .btn.cancel:hover {
			background: var(--light);
		}

		.review {
			margin: 0 10% 0 -3%;
		}

		.review img {
			width: 500px;
			height: 500px;
		}
	</style>
</head>

<body>
	<div class="container px-5 py-4" id="cart-body">
		<div class="row my-4">
			<a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
				<i class="bi bi-arrow-left-square me-2"></i>Go back
			</a>
			<div class="wrapper">
				<h3>Share your feedback with us</h3>
				<form action="#" method="post" enctype="multipart/form">
					<div class="rating">
						<input type="number" name="rating" hidden>
						<i class='bx bx-star star' style="--i: 0;"></i>
						<i class='bx bx-star star' style="--i: 1;"></i>
						<i class='bx bx-star star' style="--i: 2;"></i>
						<i class='bx bx-star star' style="--i: 3;"></i>
						<i class='bx bx-star star' style="--i: 4;"></i>
					</div>
					<textarea name="feedback" cols="30" rows="5" placeholder="Your opinion..."></textarea>
					<div class="btn-group">
						<button type="submit"  name="submit" class="btn submit">Submit</button>
						<a href ="cust_order_history.php" class="btn cancel">Cancel</a>
					</div>
				</form>
			</div>


		</div>
	</div>
	<div class="review">
		<img src="foodimgs/rating.gif">
	</div>
	
	<?php 
		if(isset($_POST['submit'])){

			$rating=$_POST['rating'];
			$feed=$_POST['feedback'];

			$insert="INSERT INTO `tbl_feedback`(`message`,`rating`,`order_id`,`cust_id`) 
			VALUES ('$feed','$rating','$odrid','$custid')";
			$insert_result = mysqli_query($con,$insert);
		}
	?>

</body>
<script>
	const allStar = document.querySelectorAll('.rating .star')
	const ratingValue = document.querySelector('.rating input')

	allStar.forEach((item, idx) => {
		item.addEventListener('click', function() {
			let click = 0
			ratingValue.value = idx + 1

			allStar.forEach(i => {
				i.classList.replace('bxs-star', 'bx-star')
				i.classList.remove('active')
			})
			for (let i = 0; i < allStar.length; i++) {
				if (i <= idx) {
					allStar[i].classList.replace('bx-star', 'bxs-star')
					allStar[i].classList.add('active')
				} else {
					allStar[i].style.setProperty('--i', click)
					click++
				}
			}
		})
	})
</script>

</html>