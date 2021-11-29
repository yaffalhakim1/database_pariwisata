<?php 
session_start();

$_SESSION['role'] == "ADMIN" ? '' : header("Location: index.php") ;

require 'config/func.php';

$id = $_GET['id'];
if(isset($_POST["edit"])){
   if(updateLoc($_POST) > 0){
      echo "<script>
            alert('Data Succesfully Update');
            document.location.href = 'location.php';
         </script>";
   }elseif(updateLoc($_POST) <= 0){
      echo "<script>
            alert('Failed update data');
            document.location.href = 'location.php';
         </script>";	
   }
}
$items = query("SELECT * FROM location WHERE loc_id = $id")[0];

// var_dump($items);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- ICON -->
		<script
			src="https://kit.fontawesome.com/3d342bf6aa.js"
			crossorigin="anonymous"
		></script>
		<!-- STYLE -->
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
			crossorigin="anonymous"
		/>
		<!-- Link Swiper's CSS -->
		<link
			rel="stylesheet"
			href="https://unpkg.com/swiper/swiper-bundle.min.css"
		/>

		<!-- Demo styles -->
		<style>
			.swiper {
				width: 100%;
				height: 100%;
			}

			.swiper-slide {
				text-align: center;
				font-size: 18px;

				/* Center slide text vertically */
				display: -webkit-box;
				display: -ms-flexbox;
				display: -webkit-flex;
				display: flex;
				-webkit-box-pack: center;
				-ms-flex-pack: center;
				-webkit-justify-content: center;
				justify-content: center;
				-webkit-box-align: center;
				-ms-flex-align: center;
				-webkit-align-items: center;
				align-items: center;
			}

			.swiper {
				margin-left: auto;
				margin-right: auto;
			}
		</style>
		<link rel="stylesheet" href="src/css/style.css" />

		<title>Pariwisata</title>
	</head>
	<body>
		<header>
			<nav
				class="navbar navbar-expand-lg navbar-light d-flex justify-content-between"
				style="background-color: #e3f2fd"
			>
				<a class="navbar-brand" href="index.php">Pariwisata</a>
			</nav>
		</header>

		<div id="main" class="container mw-100 p-5">
         <h1 class="text-center">Edit location</h1>
         <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group">
               <label for="exampleFormControlInput1">Nama Lokasi</label>
               <input required type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="loc_name" value="<?= $items['loc_name']; ?>">
            </div>
            
            <button type="submit" class="btn btn-success w-100 py-2" name="edit">Submit</button>
         </form>
		</div>

		<footer></footer>

		<script type="module" src="src/js/script.js"></script>

		<!-- Swiper JS -->
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

		<!-- Initialize Swiper -->
		<script>
			var swiper = new Swiper(".mySwiper", {
				slidesPerView: 3,
				spaceBetween: 30,
				slidesPerGroup: 3,
				loop: true,
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
			});
		</script>

		<script
			src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
			integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
			integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
			crossorigin="anonymous"
		></script>
		<script
			src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
			crossorigin="anonymous"
		></script>
	</body>
</html>
