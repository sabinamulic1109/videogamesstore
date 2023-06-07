<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>

<?php 

if (!is_admin($_SESSION['username'])) {
    redirect("indeks.php");
}

?>

<?php 

if (isset($_POST['dodaj'])) {
    $ime      = mysqli_real_escape_string($con, $_POST['ime']);
    $prezime  = mysqli_real_escape_string($con, $_POST['prezime']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email    = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $datum    = mysqli_real_escape_string($con, $_POST['datum']);
    $tip      = mysqli_real_escape_string($con, $_POST['tip']);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $sql = "INSERT INTO korisnik(ime, prezime, username, email, datum_rod, password, tip_korisnika) VALUES('{$ime}', '{$prezime}', '{$username}', '{$email}', '{$datum}', '{$password}', '{$tip}')";
    $result = mysqli_query($con, $sql);
    confirm_query($result);
}

?>

<div class="container">
    <?php include("includes/nav.php"); ?>

    <div class="row">
        <div class="col-md 6">
        <form action="" method="post">
    <div class="form-group">
        <label for="ime">Ime</label>
        <input type="text" name="ime" id="ime" class="form-control">
    </div>
    <div class="form-group">
        <label for="prezime">Prezime</label>
        <input type="text" name="prezime" id="prezime" class="form-control">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="datum">Datum rođenja</label>
        <input type="date" name="datum" id="datum" class="form-control">
    </div>
    <div class="form-group">
        <label for="tip">Tip</label>
        <select name="tip" id="tip" class="form-control">
            <option value="user">Izaberi tip</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
    </div>
    <div class="form-group checkbtn">
        <input type="submit" name="dodaj" value="Dodaj korisnika" class="btn btn-primary">
    </div>
</form>
        </div>
    </div>
</div>

<div class="footer">
    <?php include("includes/footer.php"); ?>
</div>