<?php
  include("dbcon.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/skriptica.css" rel="stylesheet">
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
            <div class="row">
                <div  class="col-12">
                     <?php
                        echo "<link href='css/sriptica.css' rel='stylesheet'>";
                        $sql_igrice = "SELECT igrice.ID_igrice, igrice.naziv,igrice.opis, igrice.cijena, igrice.slike, zanr.naziv AS zanr_ime, kompanija.naziv AS kompanija_ime  FROM igrice 
                        INNER JOIN kompanija ON igrice.kompanija_ID=kompanija.ID_kompanija
                        INNER JOIN igrice_zanr ON igrice.ID_igrice=igrice_zanr.igrica
                        INNER JOIN zanr ON igrice_zanr.zanr=zanr.ID_zanr
                        GROUP BY ID_igrice
                        ORDER BY naziv";
                        $result_igrice = $con->query($sql_igrice);
                       function delete($id_del)
                                            {
                                                    $sql_del ="DELETE * FROM igrice WHERE ID_igrice = '$id_del'";
                                                    if ($con->query($sql_del) === TRUE) {
                                                        echo "Record deleted successfully";
                                                      } else {
                                                        echo "Error deleting record: " . $con->error;
                                                      }
                                            } 
                        if ($result_igrice->num_rows > 0){
                            while($row = $result_igrice->fetch_assoc()){
                                $id_igrice=$row['ID_igrice'];
                                $naziv=$row['naziv'];
                                $opis=$row['opis'];
                                $cijena=$row['cijena'];
                                $slike=$row['slike'];
                                $zanrovi=$row['zanr_ime'];
                                $kompanija=$row['kompanija_ime'];  
                                $brel=0;
                                echo "
                                <div class='row'>
                                    <div class='col-4'>
                                        <img src='slike/$slike'>
                                    </div>
                                    <div class='col-5'>
                                        <h3>$naziv</h3>
                                        <p>$opis</p>
                                        <p>
                                       
                                        $zanrovi;
                                        </p>
                                        <p>$kompanija</p>
                                    </div>
                                    <div class='col-1'>
                                        <h1>$cijena</h1>
                                    </div> 
                                    <div class='col-2'>
                                    
                                    <button onClick='delete('$id_igrice');'>Delete</button>
                                   
                                            

                                       
                                    </div>
                                </div> ";
                            }
                        } else {
                        echo "0 results";
                        } 
                        $con->close(); 
                    ?>
                
                </div>
            </div>
            




    </div>










<script src="js/bootstrap.bundle.min.js" ></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> 
</body>
</html>
<?php 