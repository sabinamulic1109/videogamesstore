<?php

function confirm_query($result) {
    global $con;

    if (!$result) {
        die("Query failed!" .mysqli_error($con));
    }
}

function is_logged_in() {
    if (isset($_SESSION['tip_korisnika'])) {
        return true;
    }
    return false;
}

function is_admin($username = '') {
    global $con;
    $sql = "SELECT tip_korisnika FROM korisnik WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    confirm_query($result);

    $row = mysqli_fetch_array($result);
    
    if (isset($row['tip_korisnika']) && $row['tip_korisnika'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function check_if_logged_in_and_redirect($redirect_location = null) {
    if (is_logged_in()) {
        redirect($redirect_location);
    }
}

function username_exists($username) {
    global $con;

    $sql = "SELECT tip_korisnika FROM korisnik WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    confirm_query($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function redirect($lokacija) {
    header("Location:" .$lokacija);
    exit;
}

function proizvod($slika, $ime_proizvoda, $cijena_proizvoda, $id_proizvoda) {
    $proizvod = "
    <form action='kosara.php?action=delete&id=$id_proizvoda' method='post'>
                <br><div class='col-md-3'>
                    <img src=slike/$slika alt='' class='img-fluid'>
                </div>
                <div class='col-md-6'>
                    <h5 class='pt-2'>$ime_proizvoda</h5>
                    <h5 class='pt-2'>€$cijena_proizvoda</h5>
                    <button type='submit' class='btn btn-danger mx2' name='delete'>Ukloni iz košare</button>
                </div>
            </form>
    ";
    echo $proizvod;
}