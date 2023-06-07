<?php include("includes/zaglavlje.php"); ?>
<?php include("includes/nav.php"); ?>

<?php
session_destroy();
header("Location: login.php");