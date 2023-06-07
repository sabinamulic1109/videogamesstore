<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>

<div class="container">
    <?php include("includes/nav.php"); ?>

    <div class="row">
        <div class="col-md-6">
        <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Username</th>
            <th>Email</th>
            <th>Tip</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        
        $sql = "SELECT * FROM korisnik";
        $result = mysqli_query($con, $sql);
        confirm_query($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $id_korisnika = $row['id_korisnika'];
            $ime          = $row['ime'];
            $prezime      = $row['prezime'];
            $username     = $row['username'];
            $email        = $row['email'];
            $tip          = $row['tip_korisnika'];

            echo "<tr>";
            echo "<td>$id_korisnika</td>";
            echo "<td>$ime</td>";
            echo "<td>$prezime</td>";
            echo "<td>$username</td>";
            echo "<td>$email</td>";
            echo "<td>$tip</td>";
            echo "<td><a href='edit_users.php?source=edit_user&user_id={$id_korisnika}' class='btn btn-info'>Uredi</a></td>";
            ?>
            <form method="post">
                <input type="hidden" name="id_korisnika" value="<?php echo $id_korisnika; ?>">
                <?php
                if (is_admin($_SESSION['username'])) {
                    echo "<td><input type='submit' name='delete' value='Obriši' class='btn btn-danger'></td>";
                }
                
                
                ?>
            </form>
            <?php 
            
            if (isset($_POST['delete'])) {
                $id_korisnika = $_POST['id_korisnika'];

                $sql = "DELETE FROM korisnik WHERE id_korisnika = {$id_korisnika}";
                $result = mysqli_query($con, $sql);
                confirm_query($result);
                redirect("korisnici.php");
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