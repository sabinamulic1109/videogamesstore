<link href="skriptica.css" rel="stylesheet">
<?php
  include("dbcon.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/sriptica.css" rel="stylesheet">
    <naziv>Insert product</naziv>
  </head>
  <body>
  <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <i class="fas fa-gamepad"></i> Leam
                </div>
                
                <div class="col-lg-4"> 
                    
                </div>
                
                <div class="col-lg-6">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="registracija.php">Registracija</a></li>
                        <li class="list-inline-item"><a href="checkout.php">Moj profil</a></li>
                        <li class="list-inline-item"><a href="kosara.php">Moja košarica</a></li>
                        <li class="list-inline-item"><a href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">

                </div>
                
                <div class="col-lg-4"> <!--Ovo ce biti navbar-->
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="indeks.php">Home</a></li>
                        <li class="list-inline-item"><a href="shop.php">Prodavnica</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <form method="GET" action="rezultati.php">
                        <div class="leam_input_group">
                            <input type="text" name="Search" value="Search">
                            <button type="submit" name="search" value="search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <i class="fa fa-dashboard"></i> Admin
                        </li>
                        <li class="breadcrumb-item active">Dodavanje igrica</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                   <div class="">
                       <h3 class="">
                           <i class="fa fa-money fa-fw"></i> Dodaj igricu
                       </h3>
                   </div>
                   <div class="panel-body">
                       <form method="post" class="form-horizontal" enctype="multipart/form-data">
                           <div class="form-group">
                              <label class="col-md-3 control-label"> ID igrice: </label> 
                              <div class="col-md-6">
                                  <input name="ID_igrice" type="text" class="f_control" required>
                              </div>
                           </div>
                           <div class="form-group">
                            <label class="col-md-3 control-label"> Ime igrice: </label> 
                            <div class="col-md-6">
                                <input name="naziv" type="text" class="f_control" required>
                            </div>
                         </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Kompanija igrice:</label> 
                              <div class="col-md-6">
                                  <select name="kompanija" class="f_control">
                                      <option> Izaberi kompaniju: </option>
                                      <?php 
                                      $get_kompanija = "select * from kompanija";
                                      $run_kompanija = mysqli_query($con,$get_kompanija);
                                      while ($row_kompanija=mysqli_fetch_array($run_kompanija)){
                                          $kompanija_id = $row_kompanija['ID_kompanija'];
                                          $kompanija_naziv = $row_kompanija['naziv'];
                                          echo "
                                          <option value='$kompanija_id'> $kompanija_naziv </option>
                                          ";
                                      }
                                      ?>
                                  </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Odaberi žanr </label> 
                              <div class="col-md-6">
                                  
                                    <?php
                                        /* $sql = "SELECT ID_zanr, naziv FROM zanr";
                                        $result = $con->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            $show_naziv=$row['naziv'];
                                            echo "<input type='radio' name='check_list[]' value='$show_naziv'> <?php if (isset($show_naziv) && $show_naziv=='$show_naziv') echo 'checked';?> $show_naziv <br>";
                                        }
                                        } else {
                                        echo "0 results";
                                        }
                                    $con->close(); */
                                    $sql = "SELECT ID_zanr, naziv FROM zanr";
                                    $result = $con->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        $show_naziv=$row['naziv'];
                                        $ID_zanr=$row['ID_zanr'];
                                        echo "<input type='checkbox' name='check_list[]' value='$ID_zanr'><label>$show_naziv</label>";
                                    }
                                    } else {
                                    echo "0 results";
                                    }
                                        
                                        
                                    ?> 
                                  </select>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 control-label">Opis: </label> 
                              <div class="col-md-6">
                                  <textarea name="opis_igrice" cols="19" rows="6" class="f_control"></textarea>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 control-label">Cijena: </label> 
                              <div class="col-md-6">
                                  <input name="cijena_igrice" type="text" class="f_control" required>
                              </div>
                           </div>

                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Image 1 </label> 
                              <div class="col-md-6">
                                  <input name="slika_1" type="file" class="f_control" required>
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <label class="col-md-3 control-label"></label> 
                              <div class="col-md-6">
                                  <input name="submit" value="Unesi igricu" type="submit" class="">
                              </div>
                           </div>
                       </form>
                   </div>
                </div>
            </div>
        </div>







    </div>











    <script src="js/bootstrap.bundle.min.js" ></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
  </body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $id_igrice=$_POST['ID_igrice'];
        $ime_igrice=$_POST['naziv'];
        $ID_kompanije=$_POST['kompanija'];
        if(!empty($_POST['check_list'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['check_list']);
            echo "You have selected following ".$checked_count." option(s): <br/>";
            // Loop to store and display values of individual checked checkbox.
            $brojac=0;
            foreach($_POST['check_list'] as $selected[$brojac]) {
            echo "<p>".$selected[$brojac] ."</p>";
            $brojac=$brojac+1;
            }
            $final=$brojac;
            //echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
        }
        $opis_igrice=$_POST['opis_igrice'];
        $cijena_igrice=$_POST['cijena_igrice'];
        $filename = $_FILES["slika_1"]["name"];
        $tempname = $_FILES["slika_1"]["tmp_name"];   
        $folder = "slike/".$filename;
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
          }
          /*
        echo $opis_igrice . " " . $cijena_igrice . " " . $ime_igrice . " " . $ID_kompanije . " " ;
        $brojac=0;
            while($brojac<$final){
                echo $selected[$brojac] . " ";
                $brojac++;
            }    
        echo " " . $opis_igrice . " " . $filename; */
        $insert_games="insert into igrice (ID_igrice,naziv,kompanija_ID,opis,cijena,slike) values ('$id_igrice','$ime_igrice','$ID_kompanije','$opis_igrice','$cijena_igrice','$filename')";
        if ($con->query($insert_games) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $insert_games . "<br>" . $con->error;
          }
          $brojac=0;
            while($brojac<$final){
                $insert_zanrovi="insert into igrice_zanr (igrica,zanr) values ('$id_igrice','$selected[$brojac]')";
                $brojac++;
                if ($con->query($insert_zanrovi) === TRUE) {
                    echo "New record created successfully";
                  } else {
                    echo "Error: " . $insert_zanrovi . "<br>" . $con->error;
                  }
            } 
        
          $con->close();
    }



?>