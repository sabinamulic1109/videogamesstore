<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>

<?php 

if ($_SESSION['username']) {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM korisnik WHERE username = '{$username}'";
    $result = mysqli_query($con, $sql);
    confirm_query($result);
    while ($row = mysqli_fetch_assoc($result)) {
        $id_korisnika = $row['id_korisnika'];
        $ime = $row['ime'];
        $prezime = $row['prezime'];
        $username = $row['username'];
        $email = $row['email'];
        $tip_korisnika = $row['tip_korisnika'];
    }
}

if (isset($_POST['update'])) {
    $ime = mysqli_real_escape_string($con, $_POST['ime']);
    $prezime  = mysqli_real_escape_string($con, $_POST['prezime']);
    $username   = mysqli_real_escape_string($con, $_POST['username']);
    $email      = mysqli_real_escape_string($con, $_POST['email']);
    $password   = mysqli_real_escape_string($con, $_POST['password']);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $sql = "UPDATE korisnik SET ime = '{$ime}', prezime = '{$prezime}', username = '{$username}', email = '{$email}', password = '{$password}' WHERE username = '{$username}'";
    $result = mysqli_query($con, $sql);
    confirm_query($result);
}

?>

<div class="container">
    <?php include("includes/nav.php"); ?>

    <div class="row">
        <div class="col-md-6">
            <h1>Profil</h1>
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
                <div class="form-group checkbtn">
                    <input type="submit" value="Update profile" class="btn btn-primary" name="update">
                </div>
            </form>
        </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>