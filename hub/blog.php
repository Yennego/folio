<!-- ======= Journal Section ======= -->
    <!-- <div id="journal" class="text-left paddsection">

      <div class="container">
        <div class="section-title text-center">
          <h2>journal</h2>
        </div>
      </div>

      <div class="container">
        <div class="journal-block">
          <div class="row">

            <?php

                    $sql = "SELECT * FROM blog ";
            $results = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($results)) {

                $id = $row['id'];
                $title = $row['title'];
                $date = $row['date'];
                $blog_image = $row['blog_image'];
                $comment = $row['comment'];


             ?>






            <div class="col-lg-4 col-md-6">
              <div class="journal-info">

                

                <a href="blog-single.html"><img src="img/blog/$blog_image" class="img-responsive" alt="img"></a>


                <div class="journal-txt">

                  <h4><a href="blog-single.html">SO LETS MAKE THE MOST IS BEAUTIFUL</a></h4>
                  <p class="separator">To an English person, it will seem like simplified English
                  </p>

                </div>
          


              </div>
              
            </div>
            


          </div>
          <?php } ?>
        </div>
      </div>

    </div> --><!-- End Journal Section -->

