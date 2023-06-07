<!doctype html>
<?php include("includes/zaglavlje.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="skriptica.css" rel="stylesheet">
    <title>Leam gaming</title>
  </head>
  <body>
     

 <div class="container full">

    <div class="row">
        <div class="col-12">
            <?php include("includes/nav.php"); ?>
        </div>
    </div>

    <div class="row margt50 leteci">
        <div class="col-12">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">

                  <div class="carousel-item active" align="center">
                    <div class="row slajder " align="left">
                      <div class="col-4 ">
                        <h2>League of Legends</h2>
                        <br>
                        <img src="slike/lolplay.jpg" class="slajder2">
                        <p><br><br><br>League of Legends timska je igra s preko 140 prvaka s kojima možete epski igrati.</p>
                        <div class="desno"><a href="shop.php">Play Now!</a></div>
                      </div>
                      <div class="col-8 ">
                        <img src="slike/lol.jpg" class="slajder1">
                      </div>
                    </div>
                  </div>

                  <div class="carousel-item" align="center">
                    <div class="row slajder " align="left">
                      <div class="col-4 ">
                        <h2>Assassins Creed: Vallhala</h2>
                        <br>
                        <img src="slike/acplay.jpg" class="slajder2">
                        <p><br><br><br>Assassin's Creed Valhalla video je igra za igranje uloga za 2020. godinu</p>
                        <div class="desno"><a href="shop.php">Play Now!</a></div>
                      </div>
                      <div class="col-8 ">
                        <img src="slike/ac.jpg" class="slajder1">
                      </div>
                    </div>
                  </div>

                  <div class="carousel-item" align="center">
                    <div class="row slajder " align="left">
                      <div class="col-4 ">
                        <h2>CoD: Infinite warfare</h2>
                        <br>
                        <img src="slike/codplay.jpg" class="slajder2">
                        <p><br><br><br>Call of Duty je serijal računalnih igara koje su po žanru pucačine u prvom licu.</p>
                        <div class="desno"><a href="shop.php">Play Now!</a></div>
                      </div>
                      <div class="col-8 ">
                        <img src="slike/cod.webp" class="slajder1">
                      </div>
                    </div>
                  </div>

                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>