<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>
<?php check_if_logged_in_and_redirect("adminPage.php"); ?>

<?php 

if (isset($_POST['register'])) {
    $ime      = $_POST['ime'];
    $prezime  = $_POST['prezime'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $datum    = $_POST['datum'];

    if (!empty($ime) && !empty($prezime) && !empty($username) && !empty($email) && !empty($datum) && !empty($password)) {
        $ime      = mysqli_real_escape_string($con, $ime);
        $prezime  = mysqli_real_escape_string($con, $prezime);
        $username = mysqli_real_escape_string($con, $username);
        $email    = mysqli_real_escape_string($con, $email);
        $datum    = mysqli_real_escape_string($con, $datum);
        $password = mysqli_real_escape_string($con, $password);

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

        $sql = "INSERT INTO korisnik (ime, prezime, username, email, password, datum_rod, tip_korisnika) VALUES ('{$ime}', '{$prezime}', '{$username}', '{$email}', '{$password}', '{$datum}', 'user')";
        $register_query = mysqli_query($con, $sql);
        if (!$register_query) {
            die("Query failed!" .mysqli_error($con));
        }
        echo("Uspješno ste se registrirali!");
    } else {
        $poruka = "Polja ne mogu biti prazna!";
    }
}

?>

<div class="container">
    <?php include("includes/nav.php"); ?>

    <div class="row">
        <div class="col-md-6">
            <h1>Registracija</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" class="form-control">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime:</label>
                    <input type="text" name="prezime" id="prezime" class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="datum">Datum rođenja:</label>
                    <input type="date" name="datum" id="datum" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Registracija" class="btn btn-primary" name="register">
                </div>
            </form>
        </div>
        </form>
    </div>
</div>