<?php 
$conn = mysqli_connect("localhost", "root", "", "pariwisata");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}	
	return $rows;
}
function register($data, $table){
	global $conn;
	$email = htmlspecialchars($data["email"]);
	$password = htmlspecialchars($data["password"]);
   $password = base64_encode($password);
	$username = htmlspecialchars($data["username"]);
   $username = strtolower(implode("",explode(" ",$username)));
	$name = htmlspecialchars($data["name"]);

	$query = "INSERT INTO $table
				VALUES
			('', '$email','$password', '$username', '$name', 'USER')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{
	$namaFile = $_FILES['pr_img']['name'];
	$size = $_FILES['pr_img']['size'];
	$error = $_FILES['pr_img']['error'];
	$tmp_name = $_FILES['pr_img']['tmp_name'];

	// cek error
	if ($error === 4) {
		echo "<script>
				alert('Insert Pitcure!')
				</script>";
		return false;
	}

	// cek files is image
	$imgExtensionValid = ['jpg', 'jpeg', 'png', 'webp'];
	$fileExtension = explode('.', $namaFile);
	$fileExtension = strtolower(end($fileExtension));

	if (!in_array($fileExtension, $imgExtensionValid)) {
		echo "<script>
				alert('The File must be Image')
				</script>";
		return false;
	}

	// check the size
	if ($size > 2000000) {
		echo "<script>
				alert('The size of the image is too big')
				</script>";
		return false;
	}

	//upload
	$newFileName = uniqid();
	$newFileName .= '.';
	$newFileName .= $fileExtension;
	move_uploaded_file($tmp_name, 'img/'. $newFileName);

	return $newFileName;
}

function create($data){
	global $conn;
	$pr_name = htmlspecialchars($data["pr_name"]);
	$pr_desc = htmlspecialchars($data["pr_desc"]);
	$pr_tiket = htmlspecialchars($data["pr_tiket"]);
	$ctg_id = htmlspecialchars($data["ctg_id"]);
	$loc_id = htmlspecialchars($data["loc_id"]);
	$pr_img = upload();


	$query = "INSERT INTO `pariwisata`(`pr_id`, `pr_img`, `pr_name`, `pr_desc`, `pr_tiket`, `ctg_id`, `loc_id`, `is_delete`) VALUES 
			('', '$pr_img', '$pr_name','$pr_desc', '$pr_tiket', '$ctg_id', '$loc_id', '0')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function createCtg($data){
	global $conn;
	$ctg_name = htmlspecialchars($data["ctg_name"]);
	$ctg_desc = htmlspecialchars($data["ctg_desc"]);

   // check if category already exist
   $ctgQuery = query("SELECT * FROM category WHERE UPPER(ctg_name) = UPPER('$ctg_name')" );
   if ($ctgQuery != null) {
      echo "<script>
					alert('".$ctg_name." Alreafy exists');
               document.location.href = 'addCategory.php';
				</script>";
      
   }else {
      $query = "INSERT INTO `category`(`ctg_id`, `ctg_name`, `ctg_desc`) VALUES ('', '$ctg_name', '$ctg_desc')";
      mysqli_query($conn, $query);
   }
   return mysqli_affected_rows($conn);

}

function createLoc($data){
	global $conn;
	$loc_name = htmlspecialchars($data["loc_name"]);

   // check if category already exist
   $locQuery = query("SELECT * FROM `location` WHERE UPPER(loc_name) = UPPER('$loc_name')" );
   if ($locQuery != null) {
      echo "<script>
					alert('".$loc_name." Alreafy exists');
               document.location.href = 'addCategory.php';
				</script>";
      
   }else {
      $query = "INSERT INTO `location`(`loc_id`, `loc_name`) VALUES ('', '$loc_name')";
      mysqli_query($conn, $query);
   }
   return mysqli_affected_rows($conn);

}

function delete($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM pariwisata WHERE pr_id = $id");

	return mysqli_affected_rows($conn);
}

function bin($id){
	global $conn;

	$query = "UPDATE pariwisata SET
				is_delete = '1'
			WHERE pr_id = $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function restore($id){
	global $conn;

	$query = "UPDATE pariwisata SET
				is_delete = '0'
			WHERE pr_id = $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function updateCtg($data){
	global $conn;

	$id = $data["id"];
	$ctg_name = htmlspecialchars($data["ctg_name"]);
	$ctg_desc = htmlspecialchars($data["ctg_desc"]);

	$query = "UPDATE category SET
				ctg_name = '$ctg_name',
				ctg_desc = '$ctg_desc'
			WHERE ctg_id = $id";

	mysqli_query($conn, $query);

   
	return mysqli_affected_rows($conn);
}
function updateLoc($data){
	global $conn;

	$id = $data["id"];
	$loc_name = htmlspecialchars($data["loc_name"]);

	$query = "UPDATE `location` SET
				loc_name = '$loc_name'
			WHERE loc_id = $id";

	mysqli_query($conn, $query);

   
	return mysqli_affected_rows($conn);
}

function update($data){
	global $conn;

	$id = $data["id"];
	$pr_name = htmlspecialchars($data["pr_name"]);
	$pr_desc = htmlspecialchars($data["pr_desc"]);
	$pr_tiket = htmlspecialchars($data["pr_tiket"]);
	$ctg_id = htmlspecialchars($data["ctg_id"]);
	$loc_id= htmlspecialchars($data["loc_id"]);

	$query = "UPDATE pariwisata SET
				pr_name = '$pr_name',
				pr_desc = '$pr_desc',
				pr_tiket = '$pr_tiket',
				ctg_id = '$ctg_id',
				loc_id = '$loc_id'
			WHERE pr_id = $id";

	mysqli_query($conn, $query);

   
	return mysqli_affected_rows($conn);
}

function search($keyword){
	$search_query = "SELECT * FROM pariwisata WHERE
				pr_name LIKE '%$keyword%' AND is_delete = 0";
	return query($search_query);
}
?>