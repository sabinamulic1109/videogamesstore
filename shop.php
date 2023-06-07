<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>
  <div class="container">
            <?php include("includes/nav.php"); ?>

            <?php 
            
            if (isset($_POST['buy'])) {
              if (isset($_SESSION['cart'])) {
                $item_array_id = array_column($_SESSION['cart'], "product_id");
                if (in_array($_POST['product_id'], $item_array_id)) {
                  echo "<script>alert('Proizvod je već u košarici');</script>";
                  echo "window.location='shop.php'";
                } else {
                  $count = count($_SESSION['cart']);
                  $item_array = array(
                    'product_id' => $_POST['product_id']
                  );
                  $_SESSION['cart'][$count] = $item_array;
                }
                
              } else {
                $item_array = array(
                  'product_id' => $_POST['product_id']
                );
                $_SESSION['cart'][0] = $item_array;
              }
            }
            
            ?>

            <div class="row margt50">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
            <div class="row margt50">
            <?php
            $sql = "SELECT * FROM igrice ORDER BY naziv_igrice";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $id_igrice = $row['id_igrice'];
                $naziv_igrice = $row['naziv_igrice'];
                $slika = $row['slika'];
                $cijena_igre = $row['cijena'];
                $zanr=$row['zanr'];
                ?>
                
              <div class="col-4 shopic margt100">
                <h2>
                    <?php echo $naziv_igrice; ?>
                </h2>
                <hr>
                <img class="img-responsive" src="slike/<?php echo "$slika"; ?>" alt="image">
                <hr>
                <h5>Zanr: <?php echo "$zanr" ?></h5>
                <hr>
                <h4>Cijena: €<?php echo $cijena_igre; ?></h4>

                <form action="" method="post">
                <?php 
                
                if (!isset($_SESSION['username'])) {
                  echo "Morate biti prijavljeni za kupovinu! Ako nemate račun, možete se registrovati <a href='registracija.php'>ovdje</a>, a ako već imate postojeći možete se prijaviti <a href='login.php'>ovdje</a>";
                } else {
                  echo "<input type='submit' class='btn btn-primary' name='buy' value='Stavi u košaricu'><span class='glyphicon glyphicon-chevron-right'></span></a>";
                }
                
                ?>
                <input type="hidden" name="product_id" value="<?php echo $id_igrice; ?>">
                </form>
                <hr>
                </div>
                
              <?php }
              
            } else {
              echo "0 results";
            }
            $con->close();
            ?>
                    
                    </div>

            </div>
    </div>

        </div>

    <?php include("includes/footer.php"); ?>
