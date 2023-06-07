<link href="skriptica.css" rel="stylesheet">
<?php include("includes/zaglavlje.php"); ?>
  <div class="container">
            <?php include("includes/nav.php"); ?>
            <?php 
            
            if (isset($_POST['buy'])) {
              if (isset($_SESSION['cart'])) {
                $item_array_id = array_column($_SESSION['cart'], "product_id");
                if (in_array($_POST['product_id'], $item_array_id)) {
                  echo "<script>alert('Proizvod je već u košarici');</script>";
                  echo "window.location='shop.php'";
                } else {
                  $count = count($_SESSION['cart']);
                  $item_array = array(
                    'product_id' => $_POST['product_id']
                  );
                  $_SESSION['cart'][$count] = $item_array;
                }
                
              } else {
                $item_array = array(
                  'product_id' => $_POST['product_id']
                );
                $_SESSION['cart'][0] = $item_array;
              }
            }
            
            ?>
<?php
global $con;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="row">
<?php
	$query = $_GET['Search']; 
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to >
		
//$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysqli_query($con,"SELECT * FROM igrice WHERE naziv_igrice LIKE '$query%'");
			
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
		
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		$broj=mysqli_num_rows($raw_results);
		if($broj > 0){ // if one or more rows are returned do following
			
			while($results = mysqli_fetch_array($raw_results)){
                $id_igrice = $results['id_igrice'];
                $naziv_igrice = $results['naziv_igrice'];
                $slika = $results['slika'];
                $cijena_igre = $results['cijena'];
                $zanr=$results['zanr'];
                ?>

                <div class="col-4 shopic margt100">
                <h2>
                    <?php echo $naziv_igrice; ?>
                </h2>
                <hr>
                <img class="img-responsive" src="slike/<?php echo "$slika"; ?>" alt="image">
                <hr>
                <h5>Zanr: <?php echo "$zanr" ?></h5>
                <hr>        
                <h4>Cijena: €<?php echo $cijena_igre; ?></h4>

                <form action="" method="post">
                <?php 
                
                if (!isset($_SESSION['username'])) {
                  echo "Morate biti prijavljeni za kupovinu! Ako nemate račun, možete se registrovati <a href='registracija.php'>ovdje</a>, a ako već imate postojeći možete se prijaviti <a href='login.php'>ovdje</a>";
                } else {
                  echo "<input type='submit' class='btn btn-primary' name='buy' value='Stavi u košaricu'><span class='glyphicon glyphicon-chevron-right'></span></a>";
                }
                
                ?>
                <input type="hidden" name="product_id" value="<?php echo $id_igrice; ?>">
                </form>
                <hr>
                </div>
				<?php
			}
        }
			
		
		else{ // if there is no matching rows do following
			echo "No results";
		}
		
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>
</div>
</body>
</html>