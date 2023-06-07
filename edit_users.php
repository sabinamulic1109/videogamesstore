<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>

<div class="container">
    <?php include("includes/nav.php"); ?>
</div>

<?php

if (!is_admin($_SESSION['username'])) {
    redirect("indeks.php");
}

if (isset($_GET['user_id'])) {
    $korisnik_id = $_GET['user_id'];
}

$sql = "SELECT * FROM korisnik WHERE id_korisnika = '{$korisnik_id}'";
$result = mysqli_query($con, $sql);
confirm_query($result);
while ($row = mysqli_fetch_assoc($result)) {
    $id_korisnika  = $row['id_korisnika'];
    $ime           = $row['ime'];
    $prezime       = $row['prezime'];
    $username      = $row['username'];
    $email         = $row['email'];
    $tip_korisnika = $row['tip_korisnika'];
}

if (isset($_POST['update'])) {
    $ime           = mysqli_real_escape_string($con, $_POST['ime']);
    $prezime       = mysqli_real_escape_string($con, $_POST['prezime']);
    $username      = mysqli_real_escape_string($con, $_POST['username']);
    $email         = mysqli_real_escape_string($con, $_POST['email']);
    $password      = mysqli_real_escape_string($con, $_POST['password']);
    $tip_korisnika = mysqli_real_escape_string($con, $_POST['tip']);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $sql = "UPDATE korisnik SET ime = '{$ime}', prezime = '{$prezime}', username = '{$username}', email = '{$email}', password = '{$password}', tip_korisnika = '{$tip_korisnika}' WHERE id_korisnika = '{$id_korisnika}'";
    $result = mysqli_query($con, $sql);
    confirm_query($result);
    redirect("korisnici.php");
}

?>

<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h1>Uredi korisnika</h1>
            <form action="" method="post">
            <div class="form-group">
                <label for="ime">Ime:</label>
                <input value="<?php echo $ime; ?>" type="text" name="ime" id="ime" class="form-control">
            </div>
            <div class="form-group">
                <label for="prezime">Prezime:</label>
                <input value="<?php echo $prezime; ?>" type="text" name="prezime" id="prezime" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Email:</label>
                <input value="<?php echo $email; ?>" type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input value="<?php echo $username; ?>" type="text" name="username" id="username" class="form-control">
            </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tip">Tip korisnika</label>
                    <select name="tip" id="tip" class="form-control">
                        <option value="<?php echo $tip_korisnika ?>"><?php echo $tip_korisnika; ?></option>
                        <?php 
                        
                        if ($tip_korisnika == 'admin') {
                            echo "<option value='user'>user</option>";
                        } else {
                            echo "<option value='admin'>admin</option>";
                        }
                        
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Uredi korisnika" class="btn btn-primary" name="update">
                </div>
            </form>
        </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<?php include("includes/footer.php"); ?>