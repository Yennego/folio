<?php include '../hub/db.php'; ?>

<?php 

	session_start();
	ob_start();

	function logOut(){
		if (isset($_POST['logOut'])) {
		session_destroy();
		  echo "<script> window.location = '/folio/login.php'</script>";
	}
}





	function checkUser(){
		if (isset($_SESSION['fullname'])) {
			if (isset($_SESSION['email'])){
			// echo "<script> alert('Welcome : " . $_SESSION['fullname'] . " ') </script>";
			}
		}else{
			  echo "<script> window.location = '/folio/login.php'</script>";
		}
	}


// add user 
function addUser(){
	global $con;

	if (isset($_POST['addUser'])) {
		
		$fullname 	= $_POST['fullname'];
		$email 		= $_POST['email'];

		$image 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['image']['tmp_name'];


		// $image 		= $_POST['image'];
		$phone 		= $_POST['phone'];
		$password 	= $_POST['password'];
		$role 		= $_POST['role'];
		$status 	= $_POST['status'];

		move_uploaded_file($image_tmp, "../img/portuser/$image");		

		$sql = "INSERT INTO portusers( fullname, email, image, phone, password, role, status)VALUES ('{$fullname}', '{$email}', '{$image}', '{$phone}', '{$password}', '{$role}', '{$status}')";

		if ($con->query($sql) === TRUE) {
			echo "<script> window.location = 'portusers.php'</script>";
		}else{
			echo "Error " . $con->error;
		}
	}
}




// view users function 
function viewUsers(){

	//make the $con virable accessable everwhere
	global $con;  


	// select all users from the database tobe process
	$selectQuery = "SELECT * FROM portusers";
	// create's an array of users in the results virable 
	$results = mysqli_query($con, $selectQuery);

	// loop through the results array and return in a table
	while ($rows = mysqli_fetch_assoc($results)) {
		echo "<tr>"
			    ."<th>".$rows['id']."</th>"
				."<th>".$rows['fullname']."</th>"
				."<th>".$rows['email']."</th>"
				."<th>".  "<img src='../img/portuser/{$rows['image']}' width='100px'>" ."</th>"
				."<th>".$rows['phone']."</th>"
				."<th>".$rows['role']."</th>"
				."<th>".$rows['status']."</th>"
				."<th>"."<a href='portusers.php?page=editUser&id={$rows['id']}'>edit</th>".
			 	"</tr>";
	}
}




// update user function

function updateUser(){
	global $con;

	if(isset($_POST['editUser'])) {

		$id = $_POST['userId'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];

		$image 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['image']['tmp_name'];

		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$status = $_POST['status'];

		$sql = "UPDATE portusers SET 

		fullname = '{$fullname}',
		email = '{$email}',
		image = '{$image}',
		phone = '{$phone}',
		password = '{$password}',
		role = '{$role}',
		status = '{$status}'
		WHERE id = '{$id}' ";


		if ($con->query($sql) === TRUE) {
			  echo "<script> window.location = 'portusers.php'</script>";
		}else{
			echo "Error " . $con->error;
		}

	}

	

}


// deleteuser user function

// function deleteUser(){
// 	global $con;



// }





// PORTFOLIO CROUD

function addPort(){
	global $con;

	if (isset($_POST['addPort'])) {
		
		// $id = $_POST['id'];
		$title = $_POST['title'];
		$date = $_POST['date'];

		$image 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['image']['tmp_name'];

		$web 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['image']['tmp_name'];

		$card 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['image']['tmp_name'];

		$content = $_POST['content'];
		$category = $_POST['category'];
		$status = $_POST['status'];


		move_uploaded_file($image_tmp, "../img/port/$image");

		$sql = "INSERT INTO port(title, date, image, content, category, status) VALUES ('$title', '$date', '$image', '$web', '$card', '$content', '$category', '$status')"; 

		


		if ($con->query($sql) === TRUE) {
			echo "<script> window.location = 'portfolios.php'</script>";
		}else{
			echo "error" . $con->error;
		}


	}

}



function viewPort(){
	global $con;

	$sql = "SELECT * FROM port";
	$portfolios = mysqli_query($con, $sql);

	while ($rows = mysqli_fetch_assoc($portfolios)) {
		echo "<tr>"
			    ."<th>".$rows['id']."</th>"
				."<th>".$rows['title']."</th>"
				."<th>".$rows['date']."</th>"
				."<th>".  "<img src='../img/port/{$rows['image']}' width='100px'>" ."</th>"
				."<th>".  "<img src='../img/port/{$rows['image']}' width='100px'>" ."</th>"
				."<th>".  "<img src='../img/port/{$rows['image']}' width='100px'>" ."</th>"
				."<th>".$rows['content']."</th>"
				."<th>".$rows['category']."</th>"
				."<th>".$rows['status']."</th>"
				."<th>"."<a href='portfolios.php?page=editPort&id={$rows['id']}'>edit</th>".
			 	"</tr>";
	}
}

function editPort(){

	global $con;

	if (isset($_POST['editPort'])) {
		
		$title = $_POST['title'];
		$date = $_POST['date'];

		$image 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['image']['tmp_name'];

		$web 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['web']['tmp_name'];

		$card 		= 	time().$_FILES['image']['name'];
		$image_tmp 	= 	$_FILES['card']['tmp_name'];

		$content = $_POST['content'];
		$category = $_POST['category'];
		$status = $_POST['status'];


		move_uploaded_file($image_tmp, "../img/port/$image");
		move_uploaded_file($image_tmp, "../img/port/$web");
		move_uploaded_file($image_tmp, "../img/port/$card");

		$sql = "INSERT INTO port ( title, date, image, content, category, status) VALUES ( '{$title}', '{$date}', '{$image}', '{$web}', '{$card}', '{$content}', '{$category}', '{$status}'  )";


		if ($con->query($sql) === TRUE) {
			echo "<script> window.location = 'portfolios.php'</script>";
		}else{
			echo "error" . $con->error;
		}

	
}
}

function addAbout(){
	global $con;

	if (isset($_POST['addAbout'])) {
		
		$title 	= $_POST['title'];	

		$about_img 		= 	time().$_FILES['about_img']['name'];
		$image_tmp 	= 	$_FILES['about_img']['tmp_name'];


		// $image 		= $_POST['image'];
		$comment 		= $_POST['comment'];
		$date 		= $_POST['date'];

		move_uploaded_file($image_tmp, "../img/about/$about_img");		

		$sql = "INSERT INTO about ( title, about_img, comment, date)VALUES ('{$title}', '{$about_img}', '{$comment}', '{$date}')";

		if ($con->query($sql) === TRUE) {
			 echo "<script> window.location = 'about.php'</script>";
		}else{
			echo "Error " . $con->error;
		}
	}
}




// view users function 
function viewAbout(){

	//make the $con virable accessable everwhere
	global $con;  


	// select all users from the database tobe process
	$selectQuery = "SELECT * FROM about";
	// create's an array of users in the results virable 
	$results = mysqli_query($con, $selectQuery);

	// loop through the results array and return in a table
	while ($rows = mysqli_fetch_assoc($results)) {
		echo "<tr>"
			    ."<th>".$rows['id']."</th>"
				."<th>".$rows['title']."</th>"
				."<th>".  "<img src='../img/about/{$rows['about_img']}' width='100px'>" ."</th>"
				."<th>".$rows['comment']."</th>"
				."<th>".$rows['date']."</th>"
				."<th>"."<a href='about.php?page=editAbout&id={$rows['id']}'>edit</th>".
			 	"</tr>";
	}
}




function editAbout(){

	global $con;

	if (isset($_POST['editAbout'])) {
		
		$title = $_POST['title'];
		
		$about_img 		= 	time().$_FILES['about_img']['name'];
		$image_tmp 	= 	$_FILES['about_img']['tmp_name'];

		$comment = $_POST['comment'];
		$date = $_POST['date'];
		


		move_uploaded_file($image_tmp, "../img/about/$about_img");
		

		$sql = "INSERT INTO about ( title, about_img, comment, date) VALUES ( '{$title}', '{$about_img}', '{$comment}', '{$date}'  )";


		if ($con->query($sql) === TRUE) {
			echo "<script> window.location = 'about.php'</script>";
		}else{
			echo "error" . $con->error;
		}

	
}
}


// update user function

function updateAbout(){
	global $con;

	if(isset($_POST['editAbout'])) {

		$id = $_POST['id'];
		$title = $_POST['title'];

		$about_img 		= 	time().$_FILES['about_img']['name'];
		$image_tmp 	= 	$_FILES['about_img']['tmp_name'];

		$comment = $_POST['comment'];
		$date = $_POST['date'];

		$sql = "UPDATE about SET 

		title = '{$title}',
		about_img = '{$about_img}',
		comment = '{$comment}',
		date = '{$date}'
		WHERE id = '{$id}' ";


		if ($con->query($sql) === TRUE) {
			   echo "<script> window.location = 'about.php'</script>";
		}else{
			echo "Error " . $con->error;
		}

	}

	

}






?>
