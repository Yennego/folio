<?php 
	if (isset($_GET['id'])) {
		$aId = $_GET['id'];
	}

	$sql = "SELECT * FROM about WHERE id = {$aId} ";
	$results = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_assoc($results)) {

		$id = $row['id'];
		$title = $row['title'];
		$about_img = $row['about_img'];
		$comment = $row['comment'];
		$date = $row['date'];
		


 ?>
<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-title text-center">
				<h3 class="display-3">Edit About Form</h3>
			</div>
			<div class="card-body">
				<?php updateAbout(); ?>

				<form class="row g-3" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id; ?>">
				  <div class="col-md-12">
				    <label for="title" class="form-label">Enter About Title </label>
				    <input type="text" class="form-control form-control-lg" name="title" value="<?= $title ?>">
				  </div>
				  
				  <div class="col-md-6">
				    <label for="image" class="form-label">Select About Image</label>
				    <input type="file" class="form-control form-control-lg" name="about_img">
				  </div>

				  <div class="col-md-12">
				    <label>Comment</label>
				    <textarea name="comment" class="form-control " rows="8"><?= $comment; ?></textarea>
				  </div>

				  <div class="col-md-6">
				    <label for="date" class="form-label">Date</label>
				    <input type="date" class="form-control form-control-lg" name="date" value="<?= $date; ?>">
				  </div>
				  
				  	<div>
				  		<br><br>
				  		<button type="submit" class="btn btn-lg btn-primary" name="editAbout">Save Changes</button>

				  		<button type="button" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#exampleModal" style="float: right;">
				  Delete About
				</button>
				  	</div>
				   
				</form>
				
			</div>
		</div>
		
	</div>


	<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<img src="../img/about/<?= $about_img; ?>" width="100%">
				</div>
			</div>
		</div>
</div>





<?php } ?>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete About Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are u sure u want to delete <b><?= $title ?> </b>?</p>
      </div>
      <div class="modal-footer">
      	<form method="POST">
      		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button name="deleteAbout" type="submit" class="btn btn-danger">Yes</button>
      	</form>
        

      </div>
    </div>
  </div>
</div>

<?php 

	if (isset($_POST['deleteAbout'])) {
		$sql = "DELETE FROM about  WHERE id = {$id} ";

		if($con->query($sql) === TRUE){
			echo "<script> window.location = 'about.php'</script>";
		}else {
			echo "Error ". $con->error;
		}

	}
	

 ?>


