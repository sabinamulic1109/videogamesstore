<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>

<?php 

if (isset($_POST['delete'])) {
    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Proizvod je uklonjen iz košarice!')</script>";
                echo "<script>window.location='kosara.php'</script>";
            }
        }
    }
}

?>

<div class="container">
    <?php include("includes/nav.php"); ?>

    <div class="row px-5">
        <div class="col-md-7">
            <?php
            
            if (isset($_SESSION['cart'])) {
                $id_proizvoda = array_column($_SESSION['cart'], 'product_id');
                $sql = "SELECT * FROM igrice";
                $result = mysqli_query($con, $sql);
                confirm_query($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    foreach ($id_proizvoda as $id) {
                        if ($row['id_igrice'] == $id) {
                            proizvod($row['slika'], $row['naziv_igrice'], $row['cijena'], $row['id_igrice']);
                        }
                    }
                }
            } else {
                echo "<h1>Košarica je prazna</h1>";
            }
            
            ?>
        </div>
    </div>
</div>

<div class="footer">
    <?php include("includes/footer.php"); ?>
</div>