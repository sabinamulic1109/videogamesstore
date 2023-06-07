<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>

<?php 

if (!is_admin($_SESSION['username'])) {
    redirect("indeks.php");
}

?>

<?php 

if (isset($_GET['p_id'])) {
    $igra_id = $_GET['p_id'];
}

$sql = "SELECT * FROM igrice WHERE id_igrice = $igra_id";
$result = mysqli_query($con, $sql);
confirm_query($result);

while ($row = mysqli_fetch_assoc($result)) {
    $id_igrice = $row['id_igrice'];
    $ime_igrice = $row['naziv_igrice'];
    $kompanija_igrice = $row['id_kompanije'];
    $zanr_igrice = $row['zanr'];
    $cijena_igre = $row['cijena'];
    $keywords = $row['keywords'];
    $opis_igre = $row['opis'];
    $image = $row['slika'];
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
    if (empty($image)) {
        $sql = "SELECT * FROM igrice WHERE id_igrice = {$igra_id}";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $image = $row['slika'];
        }
    }

    $sql = "UPDATE igrice SET id_kompanije = {$kompanija_igrice}, naziv_igrice = '{$ime_igrice}', zanr = '{$zanr_igrice}', opis = '{$opis_igre}', cijena = '{$cijena_igre}', slika = '{$image}', keywords = '{$keywords}'  WHERE id_igrice = $id_igrice";
    $result = mysqli_query($con, $sql);
    confirm_query($result);
}


?>

<div class="container">
    <?php include("includes/nav.php"); ?>
    
    <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                   <div class="panel-heading">
                       <h3 class="panel-naziv">
                           <i class="fa fa-money fa-fw"></i> Uredi igricu
                       </h3>
                   </div>
                   <div class="panel-body">
                       <form method="post" class="form-horizontal" enctype="multipart/form-data">
                           <div class="form-group">
                            <label class="col-md-3 control-label"> Ime igrice: </label> 
                            <div class="col-md-6">
                                <input value="<?php echo $ime_igrice; ?>" name="naziv" type="text" class="f_control" required>
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
                                          if ($kompanija_id == $kompanija_igrice) {
                                            echo "<option selected value={$kompanija_id}>{$naziv_kompanije}</option>";
                                        } else {
                                            echo "<option value={$kompanija_id}>{$naziv_kompanije}</option>";
                                        }
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
                              <img width="100" src="slike/<?php echo $image; ?>" alt="">
                              <input type="file" name="image" id="image" class="form-control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Price </label> 
                              <div class="col-md-6">
                                  <input value="<?php echo $cijena_igre; ?>" name="product_price" type="text" class="f_control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Keywords </label> 
                              <div class="col-md-6">
                                  <input value="<?php echo $keywords; ?>" name="product_keywords" type="text" class="f_control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"> Product Desc </label> 
                              <div class="col-md-6">
                                  <textarea name="product_desc" cols="19" rows="6" class="form-control"><?php echo $opis_igre; ?></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-3 control-label"></label> 
                              <div class="col-md-6">
                                  <input name="submit" value="Uredi" type="submit" class="btn btn-primary f_control">
                              </div>
                           </div>
                       </form>
                   </div>
                </div>
            </div>
        </div>
</div>

<?php include("includes/footer.php"); ?>