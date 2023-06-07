<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>
<?php check_if_logged_in_and_redirect("adminPage.php"); ?>

<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "SELECT * FROM korisnik WHERE username = '{$username}'";
    $select_user = mysqli_query($con, $sql);
    if (!$select_user) {
        die("Query failed!" .mysqli_error($con));
    }

    while ($row = mysqli_fetch_array($select_user)) {
        $db_id_kor = $row['ID_kor'];
        $db_ime = $row['ime'];
        $db_prezime = $row['prezime'];
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_email = $row['email'];
        $db_datum = $row['datum_rod'];
        $db_tip = $row['tip_korisnika'];
    }

    if (password_verify($password, $db_password)) {
        $_SESSION['ime'] = $db_ime;
        $_SESSION['prezime'] = $db_prezime;
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_email;
        $_SESSION['datum_rod'] = $db_datum;
        $_SESSION['tip_korisnika'] = $db_tip;
        header("Location: home.php");
    } else {
        header("Location: login.php");
    }
}

?>

<div class="container">
    <?php include("includes/nav.php"); ?>

    <div class="row">
        <div class="col-md-6">
            <h1>Login</h1>
            <form action="" method="post">
            <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group margt50">
                    <input type="submit" value="Login" class="btn btn-primary" name="login">
                </div>
            </form>
        </div>
        </form>
    </div>
</div>