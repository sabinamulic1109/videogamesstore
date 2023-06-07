<head>
    <style>
        .topnav .leam_input_group {
            float: right;
        }
        
        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
         }
        
        .btn_leam {
            float: right;
            padding: 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }
        
        .btn_leam:hover {
            background: #ccc;
        }
        
    </style>
</head>
<div class="row">
                <div class="col-lg-6">
                <p class="logo"><svg aria-hidden="true" class="logo" focusable="false" data-prefix="fas" data-icon="gamepad" class="svg-inline--fa fa-gamepad fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M480.07 96H160a160 160 0 1 0 114.24 272h91.52A160 160 0 1 0 480.07 96zM248 268a12 12 0 0 1-12 12h-52v52a12 12 0 0 1-12 12h-24a12 12 0 0 1-12-12v-52H84a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h52v-52a12 12 0 0 1 12-12h24a12 12 0 0 1 12 12v52h52a12 12 0 0 1 12 12zm216 76a40 40 0 1 1 40-40 40 40 0 0 1-40 40zm64-96a40 40 0 1 1 40-40 40 40 0 0 1-40 40z"></path></svg> 
                LEAM</p>
                </div>
                
                <div class="col-lg-6 gore">
                    <ul class="list-inline navic">
                        <?php 
                        
                        if (!isset($_SESSION['username'])) {
                            echo "<li class='list-inline-item'><a href='registracija.php'>Registracija</a></li>";
                        } else if (is_admin($_SESSION['username'])) {
                            echo "<li class='list-inline-item'><a href='checkout.php'>Moj profil | </a></li>";
                            echo "<li class='list-inline-item'><a href='dodaj_korisnika.php'>Dodaj korisnika | </a></li>";
                            echo "<li class='list-inline-item'><a href='adminPage.php'>Igrice | </a></li>";
                            echo "<li class='list-inline-item'><a href='kosara.php'>Moja košarica | </a></li>";
                        } else {
                            echo "<li class='list-inline-item'><a href='checkout.php'>Moj profil | </a></li>";
                            echo "<li class='list-inline-item'><a href='kosara.php'>Moja košarica | </a></li>";
                        }
                        
                        ?>
                        <?php 
                        
                        if (!isset($_SESSION['username'])) {
                            echo "<li class='list-inline-item'><a href='login.php'>Login</a></li>";
                        } else {
                            echo "<li class='list-inline-item'><a href='logout.php'>Logout</a></li>";
                            echo "<br>Prijavljeni ste kao " . $_SESSION['username'] . "";
                        }
                        
                        ?>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-1">

                </div>
                
                <div class="col-lg-8"> <!--Ovo ce biti navbar-->
                    <ul class="list-inline navbarLema">
                        <?php

                        if (!isset($_SESSION['username'])) {
                          echo"  <li class='list-inline-item'><a href='home.php'>Home</a></li>";
                          echo"  <li class='list-inline-item'><a href='shop.php'>Prodavnica</a></li>";
                        } else if (is_admin($_SESSION['username'])) {
                            echo"  <li class='list-inline-item'><a href='home.php'>Home</a></li>";
                          echo"  <li class='list-inline-item'><a href='shop.php'>Prodavnica</a></li>";
                          echo "<li class='list-inline-item'><a href='korisnici.php'>Korisnici</a></li>";
                            echo "<li class='list-inline-item'><a href='indeks.php'>Igrice</a></li>";
                        
                        } else {
                            echo"  <li class='list-inline-item'><a href='home.php'>Home</a></li>";
                          echo"  <li class='list-inline-item'><a href='shop.php'>Prodavnica</a></li>";
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-3 navic">

                    <div class="topnav">
                        <div class="leam_input_group">
                            <form method="GET" action="rezultati.php">
                            <input type="text"  name="Search" placeholder="Search...">
                            <button class="btn_leam" type="submit" name="search" value="search" style="height:37px;">
                                <i class="fas fa-search"></i>
                            </button>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
            
            <?php include("includes/footer.php"); ?>