<?php
    include 'header.php';
    session_start();
    include 'connect.php';
?>
<section id="portfolio" >
    <div class="container pt-5">

        <?php
            if (isset($_POST['book'])) {
                $id = $_POST["id"];
                $sql = "SELECT * FROM home where id= $id ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo '
                    <section id="portfolio-details" class="portfolio-details">
                    <div class="container">
                        <h2 class="portfolio-title text-center">This is a brief discription about our Apartment</h2>
                        <div class="row">
                
                        <div class="col-lg-8" data-aos="fade-right">
                            <div class="owl-carousel portfolio-details-carousel">
                                <img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" class="img-fluid"  />
                            </div>
                        </div>
                
                        <div class="col-lg-4 portfolio-info" data-aos="fade-left">
                            <h3>Apartment information</h3>
                            <ul>
                            <li><strong>Discripation</strong>:'. $row["address"] .'</li>
                            <li style="color:red"><strong>price</strong>: '. $row["price"] .'</li>
                            <li><strong>Owener Name</strong>: '. $row["owener_name"] .'</li>
                            <li><strong>Owener contact No.</strong>: '. $row["contact"] .'</li>
                            </ul>
                
                            <p>
                            <h4><strong>Address</strong>:  '. $row["discription"] .'</h4>
                            </p>
                        </div>
                
                        </div>
                
                    </div>
                    </section>';
                    }
                    } else {
                        echo "0 results";
                    }
                
            }
        ?>
    </div>
</section>  
<?php
    include'footer.php';
?>