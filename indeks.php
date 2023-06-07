<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>
        <div class="container">
            <?php include("includes/nav.php"); ?>

            <div class="row">
                <!--Slider-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naslov</th>
            <th>Kompanija</th>
            <th>Slika</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $query = "SELECT igrice.id_igrice, igrice.id_kompanije, igrice.naziv_igrice, igrice.slika, kompanija.kompanija_id, kompanija.naziv_kompanije FROM igrice LEFT JOIN kompanija ON igrice.id_kompanije = kompanija.kompanija_id ORDER BY igrice.id_igrice DESC";
        $result = mysqli_query($con, $query);
        confirm_query($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $id_igrice       = $row['id_igrice'];
            $naziv_igrice     = $row['naziv_igrice'];
            $kompanija = $row['id_kompanije'];
            $slika    = $row['slika'];
            $id_kompanije = $row['kompanija_id'];
            $naziv_kompanije = $row['naziv_kompanije'];

            echo "<tr>";
            echo "<td>$id_igrice</td>";
            echo "<td>$naziv_igrice</td>";
            echo "<td>$naziv_kompanije</td>";;
            echo "<td><img src='slike/{$slika}' alt='image' height='10px' </td>";
            if (isset($_SESSION['username'])) {
                echo "<td><a class='btn btn-info' href='igrice.php?source=uredi_igru&p_id={$id_igrice}'>Uredi</a></td>";
            }
            ?>

            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id_igrice; ?>">
                <?php

                if (isset($_SESSION['username']) && is_admin($_SESSION['username'])) {
                    echo "<td><input type='submit' name='delete' class='btn btn-danger' value='Obriši'></td>";
                }
                ?>
            </form>
            <?php 
            
            if (isset($_POST['delete'])) {
                $id_igrice = $_POST['id'];
                $query = "DELETE FROM igrice WHERE id_igrice = {$id_igrice}";
                $result = mysqli_query($con, $query);
                confirm_query($result);
                redirect("indeks.php");
            }
            
            ?>
        <?php }
        
        ?>
    </tbody>
</table>
                </div>

            </div>




        </div>










    <?php include("includes/footer.php"); ?>
