<div class="card">
	<div class="card-title text-center">
		<h3 class="display-3">Add About Form</h3>
	</div>
	<div class="card-body">
		<?php addAbout(); ?>

		<form class="row g-3" method="POST" enctype="multipart/form-data">
		  <div class="col-md-12">
		    <label for="title" class="form-label">Enter About Title </label>
		    <input type="text" class="form-control form-control-lg" name="title">
		  </div>
		 
		  <div class="col-md-6">
		    <label for="image" class="form-label">Select About Image</label>
		    <input type="file" class="form-control form-control-lg" name="about_img">
		  </div>


		  <div class="col-md-12">
		    <label>Comment</label>
		    <textarea name="comment" class="form-control " rows="8"></textarea>
		  </div>

		   <div class="col-md-6">
		    <label for="date" class="form-label">Date</label>
		    <input type="date" class="form-control form-control-lg" name="date">
		  </div>

		  
		  	<div>
		  		<br><br>
		  		<button type="submit" class="btn btn-lg btn-primary" name="addAbout">Create About</button>
		  	</div>
		   
		</form>
	</div>
</div>