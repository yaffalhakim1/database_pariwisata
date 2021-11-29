<?php 
require 'config/func.php';

if (isset($_POST['signin'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   session_start();
   $users = query("SELECT * FROM user WHERE email = '$email'")[0];
   echo base64_decode($users['password']) == $password;
   if (base64_decode($users['password']) == $password) {
      $_SESSION['login'] = true;
      $_SESSION['name'] = $users['name'];
      $_SESSION['role'] = $users['role'];
      // var_dump($users);
      header("Location: home.php");
   }else {
      header("Location: login.php?failed=");
   }

}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta role="viewport" content="width=device-width, initial-scale=1.0" />
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
			body {
				min-height: 100vh;
			}
		</style>
		<link rel="stylesheet" href="src/css/style.css" />

		<title>Pariwisata</title>
	</head>
	<body>
		<section
			class="d-flex align-items-center"
			style="background-color: #508bfc; min-height: 100vh"
		>
			<div class="container py-5 h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card shadow-2-strong" style="border-radius: 1rem">
							<div class="card-body p-5 text-center">
								<h3 class="">Sign in</h3>

                        <?= isset($_GET['failed']) ? '<h6 class="text-danger">Failed Login! Try Again</h6>': ''; ?>

                        <form action="" method="post">

								<div class="form-outline mb-4 mt-5">
									<label class="form-label" for="typeEmailX-2">Email</label>
									<input
										type="email"
										id="typeEmailX-2"
										class="form-control form-control-lg"
                              name="email"
                              required
									/>
								</div>

								<div class="form-outline mb-4">
									<label class="form-label" for="typePasswordX-2"
										>Password</label
									>
									<input
                              required
										type="password"
										id="typePasswordX-2"
										class="form-control form-control-lg"
                              name="password"
									/>
								</div>

								<button class="btn btn-primary btn-lg btn-block" type="submit" name="signin">
									Login
								</button>

                        </form>
								<div>
									<p class="mt-5">
										Don't have an account?
										<a href="register.php" class="text-white-50 fw-bold">Sign Up</a>
									</p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script type="module" src="src/js/script.js"></script>

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
