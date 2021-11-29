<?php 
session_start();

!isset($_SESSION['login']) ? header("Location: index.php") : '' ;

require 'config/func.php';

$items = isset($_POST['search']) ? search($_POST['keyword']) : query("SELECT * FROM pariwisata WHERE is_delete = 0");

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
         body{
            min-height: 100vh;
			background-color: #e3f2fd;
         }
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
				style="background-color: #e3f2fd">
				<a class="navbar-brand" href="#">adadsdsa</a>

            <form class="form-inline my-2 my-lg-0" method="POST">
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

      <!-- HELLO -->
      <div class="d-flex justify-content-between w-100 p-3">
         <h4>Hello, <?= $_SESSION['name']; ?> <?php echo $_SESSION['role'] == "ADMIN" ? "(ADMIN)" : ''; ?></h4>
         <a href="action.php?logout=" class="btn btn-danger text-white py-1" style="text-decoration: none; margin-bottom:0;">Logout</a>

      </div>



		<div id="main" class="container mw-100 d-flex flex-column justify-content-center" style="margin-bottom: 10vh;">

      <?php if($_SESSION['role'] == 'ADMIN'): ?>
         <!-- BUTTON  -->
         <div class="d-flex mx-5">
            <a href="category.php" class="btn btn-secondary text-white py-3" style="text-decoration: none; margin-bottom:0; flex:1;">Category</a>
            <a href="location.php" class="btn btn-warning text-white py-3 ml-1" style="text-decoration: none; margin-bottom:0;flex:1;">Location</a>
         </div>
         <div class="d-flex mt-2 mx-5">
            <a href="bin.php" class="btn btn-danger text-white py-3 mr-1" style="text-decoration: none; margin-bottom:0;flex:1;"><i class="fas fa-trash"></i></a>
            <a href="add.php" class="btn btn-success text-white py-3 " style="text-decoration: none; margin-bottom:0; flex:4;"><i class="fas fa-plus"></i> Add Pariwisata</a>
            <a href="addCategory.php" class="btn btn-primary text-white py-3 ml-1" style="text-decoration: none; margin-bottom:0;flex:1;"><i class="fas fa-plus"></i> Add Category</a>
         </div>
         <?php endif; ?>
         

				<table>
					<tr>
						<th>Nama</th>
					</tr>
					<?php foreach($items as $i): ?>
					<tr>
						<td><?= $i['pr_name']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>

			<!-- Swiper -->
			<div class="swiper mySwiper mt-5">
				<div class="swiper-wrapper">
               <?php foreach($items as $i): ?>
					<div class="swiper-slide">
						<div class="card mx-5" style="width: 18rem;">
							<img
								class="card-img-top"
								src="img/<?= $i['pr_img']; ?>"
								alt="Card image cap"
                        style="height: 20vh;"
							/>
							<div class="card-body bra h-50 ">
								<h5 class="card-title"><?= $i['pr_name']; ?></h5>
								<p class="card-text" style="height: 20vh; overflow:hidden;">
									<?= $i['pr_desc']; ?>
								</p>
								<a href="detail.php?id=<?= $i['pr_id']; ?>" class="btn btn-primary">Show more</a>
							</div>
						</div>
					</div>
               <?php endforeach; ?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>

			
		</div>

		

		<script type="module" src="src/js/script.js"></script>

		<!-- Swiper JS -->
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

		<!-- Initialize Swiper -->
		<script>
			var swiper = new Swiper(".mySwiper", {
				slidesPerView: 3,
				spaceBetween: 30,
				slidesPerGroup: 3,
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
