<main id="main">

    <!-- ======= About Section ======= -->
    <div id="about" class="paddsection">
      <div class="container">
        <div class="row justify-content-between">


          <?php

                    $sql = "SELECT * FROM about ";
            $results = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($results)) {

                $id = $row['id'];
                $title = $row['title'];
                $about_img = $row['about_img'];
                $comment = $row['comment'];
                $date = $row['date'];


             ?>

          <div class="col-lg-4 ">
            <div class="div-img-bg">
              <div class="about-img">
                <img src="img/about/<?= $about_img ?>" class="img-responsive" alt="me">
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="about-descr">

              <p class="p-heading"><?= $title ?> </p>
              <p class="separator"><?= $comment ?></p>

            </div>
            
          </div>
        <?php }?>
        </div>
      </div>
    </div><!-- End About Section -->
