<?php 
session_start();

$_SESSION['role'] == "ADMIN" ? '' : header("Location: index.php") ;

require 'config/func.php';

$id = $_GET['id'];
if(isset($_POST["edit"])){
   if(update($_POST) > 0){
      echo "<script>
            alert('New Data Succesfully Update');
            document.location.href = 'home.php';
         </script>";
   }elseif(update($_POST) <= 0){
      echo "<script>
            alert('Failed update data');
            document.location.href = 'home.php';
         </script>";	
   }
}
$items = query("SELECT * FROM pariwisata as pr JOIN category as ctg ON pr.ctg_id = ctg.ctg_id JOIN location as loc ON pr.loc_id = loc.loc_id WHERE pr.pr_id = $id")[0];
$ctg = query("SELECT * FROM category");
$loc = query("SELECT * FROM location");

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
				<a class="navbar-brand" href="#">Pariwisata</a>

            <form action="home.php" class="form-inline my-2 my-lg-0" method="POST">
						<input
							class="form-control mr-sm-2"
							type="search"
							placeholder="Search"
							aria-label="Search"
                     name="keyword"
                  />
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">
							Search
						</button>
					</form>
			</nav>
		</header>

		<div id="main" class="container mw-100 p-5">
         <img class="w-100 px-5 mb-5" style="height: 50vh; object-fit:cover;" src="img/<?= $items['pr_img']; ?>" alt="">
         
         <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="form-group">
               <label for="exampleFormControlInput1">Nama Pariwisata</label>
               <input required type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="pr_name" value="<?= $items['pr_name']; ?>">
            </div>
            
            <div class="form-group">
               <label for="exampleFormControlSelect1">Category</label>
               <select class="form-control" id="exampleFormControlSelect1" name="ctg_id">
                  <?php foreach($ctg as $c): ?>
                     <option value="<?= $c['ctg_id']; ?>" <?= $c['ctg_id'] == $items['ctg_id'] ? "selected='selected'" : ''; ?> ><?= $c['ctg_name']; ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="form-group">
               <label for="exampleFormControlSelect1">Location</label>
               <select class="form-control" id="exampleFormControlSelect1" name="loc_id">
                  <?php foreach($loc as $c): ?>
                     <option value="<?= $c['loc_id']; ?>" <?= $c['loc_id'] == $items['loc_id'] ? "selected='selected'" : ''; ?> ><?= $c['loc_name']; ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <div class="form-group">
               <label for="exampleFormControlInput1">Harga Tiket</label>
               <input required type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp." name="pr_tiket" value="<?= $items['pr_tiket']; ?>">
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">Deskripsi</label>
               <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="pr_desc"><?= $items['pr_desc']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2" name="edit">Submit Change</button>
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
