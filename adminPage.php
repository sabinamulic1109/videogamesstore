<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>
<?php is_logged_in(); ?>

<?php 

if (!is_admin($_SESSION['username'])) {
    redirect("indeks.php");
}

if (!isset($_SESSION['tip_korisnika'])) {
    redirect("indeks.php");
}

if (isset($_POST['submit'])) {
    $ime_igrice = mysqli_real_escape_string($con, $_POST['naziv']);
    $kompanija_igrice = mysqli_real_escape_string($con, $_POST['kompanija']);
    $zanr_igrice = mysqli_real_escape_string($con, $_POST['gender']);
    $image       = $_FILES['image']['name'];
    $temp_image  = $_FILES['image']['tmp_name'];
    $cijena_igre = mysqli_real_escape_string($con, $_POST['product_price']);
    $keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $opis_igre = mysqli_real_escape_string($con, $_POST['product_desc']);

    move_uploaded_file($temp_image, "slike/$image");

    $sql = "INSERT INTO igrice(id_kompanije, naziv_igrice, zanr, opis, cijena, slika, keywords) VALUES({$kompanija_igrice}, '{$ime_igrice}', '{$zanr_igrice}', '{$opis_igre}', '{$cijena_igre}', '{$image}', '{$keywords}')";
    $result = mysqli_query($con, $sql);
    confirm_query($result);
    $id_igrice = mysqli_insert_id($con);
}

?>

  <div class="container">
            <?php include("includes/nav.php"); ?>
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
                <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3 class="panel-naziv">
                           <i class="fa fa-money fa-fw"></i> Dodaj igricu
                       </h3>
                   </div>
                   <div class="panel-body">
                       <form method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                          $kompanija_id = $row_kompanija['kompanija_id'];
                                          $naziv_kompanije = $row_kompanija['naziv_kompanije'];
                                          echo "
                                          <option value='$kompanija_id'> $naziv_kompanije </option>
                                          ";
                                      }
                                      ?>
                                  </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Odaberi žanr </label> 
                              <div class="col-md-6">
                                    <input type="radio" name="gender" value="moba">MOBA
                                    <input type="radio" name="gender" value="fps">FPS
                                    <input type="radio" name="gender" value="rpg">RPG
                                    <input type="radio" name="gender" value="avanturisticka">avanturisticka
                                    <input type="radio" name="gender" value="pucačina">Pucačina
                                    <input type="radio" name="gender" value="akcijsko-pustolovna">Akcijsko-pustolovna
                                    <input type="radio" name="gender" value="vestern">Vestern
                                    <input type="radio" name="gender" value="horror">Horror
                                    <input type="radio" name="gender" value="borilacka">Borilacka
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Image  </label> 
                              <div class="col-md-6">
                              <input type="file" name="image" id="image" class="form-control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Price </label> 
                              <div class="col-md-6">
                                  <input name="product_price" type="text" class="f_control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Keywords </label> 
                              <div class="col-md-6">
                                  <input name="product_keywords" type="text" class="f_control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Desc </label> 
                              <div class="col-md-6">
                                  <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"></label> 
                              <div class="col-md-6 checkbtn">
                                  <input name="submit" value="Insert Product" type="submit" class="btn btn-primary f_control">
                              </div>
                           </div>
                       </form>
                   </div>
                </div>
            </div>
        </div>
    </div>











    <?php include("includes/footer.php"); ?>
