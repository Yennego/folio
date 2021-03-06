<!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="paddsection">

      <div class="container">
        <div class="section-title text-center">
          <h2>My Portfolio</h2>
        </div>
      </div>

      <div class="container">

        <div class="row">

            <?php

                    $sql = "SELECT * FROM port ";
            $results = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($results)) {

                $id = $row['id'];
                $title = $row['title'];
                $date = $row['date'];
                $image = $row['image'];
                $web = $row['web'];
                $card = $row['card'];
                $content = $row['content'];
                $category = $row['category'];
                $status = $row['status'];


             ?>





          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="img/port/<?= $image ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="img/port/<?= $image ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/port/<?= $image ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="img/port/<?= $image ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>

          

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="img/port/<?= $image ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <a href="img/port/<?= $image ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        <?php 
        }
          ?>
          
          

        </div>

      </div>

    </div><!-- End Portfolio Section -->