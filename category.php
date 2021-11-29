<?php 
require 'config/func.php';

session_start();

if (isset($_GET['del'])) {
   global $conn;
   $id = $_GET['id'];

	mysqli_query($conn, "DELETE FROM category WHERE ctg_id = $id");
}

!isset($_SESSION['login']) ? header("Location: index.php") : '' ;


$items = query("SELECT * FROM category");

if (isset($_POST['search'])) {
   $key = $_POST['keyword'];

   $items = query("SELECT * FROM category WHERE
				ctg_name LIKE '%$key%'");
}

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
				style="background-color: #e3f2fd"
			>
				<a class="navbar-brand" href="index.php">Pariwisata</a>

            <form action="" class="form-inline my-2 my-lg-0" method="POST">
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
      <div class="d-flex justify-content-between w-100 p-3">
         <h4>Hello, <?= $_SESSION['name']; ?> <?php echo $_SESSION['role'] == "ADMIN" ? "(ADMIN)" : ''; ?></h4>
         <a href="action.php?logout=" class="btn btn-danger text-white py-1" style="text-decoration: none; margin-bottom:0;">Logout</a>

      </div>



		<div id="main" class="container mw-100 d-flex flex-column justify-content-center" style="margin-bottom: 10vh;">

      <?php if($_SESSION['role'] == 'ADMIN'): ?>

         <div class="d-flex mt-2 mx-5">
            <a href="addCategory.php" class="btn btn-success text-white py-3 " style="text-decoration: none; margin-bottom:0; flex:4;"><i class="fas fa-plus"></i> Add Category</a>
         </div>
         <?php endif; ?>
         
			<!-- Swiper -->
			<table class="table table-hover mt-5 ">
            <thead>
               <tr>
                  <th scope="col">id</th>
                  <th scope="col">name</th>
                  <th scope="col">description</th>
                  <th scope="col">action</th>
               </tr>
            </thead>
            <tbody>
                     <?php foreach($items as $item): ?>
                  <tr>
                     <th scope="row"><?= $item['ctg_id']; ?></th>
                     <td><?= $item['ctg_name']; ?></td>
                     <td><?= $item['ctg_desc']; ?></td>
                     <td class="d-flex flex-column ">
                        <a href="ctgEdit.php?id=<?= $item['ctg_id']; ?>" style="text-decoration: none;" class="text-white btn btn-primary">edit</a>
                        <a href="category.php?id=<?= $item['ctg_id']; ?>&del=" style="text-decoration: none;" class="text-white btn btn-danger">delete</a>
                     </td>
                  </tr>
                     <?php endforeach; ?>
            </tbody>
         </table>
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
