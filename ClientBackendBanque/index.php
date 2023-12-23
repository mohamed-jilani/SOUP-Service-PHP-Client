<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Finexo </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    table, th, td {
      border: 1px solid rgb(0, 234, 255);
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
    }
    </style>

</head>

<body class="sub_page">

  <?php

  // URL du service web
  $serviceUrl = 'http://localhost:5000/?wsdl';

  // Création d'un objet SoapClient
  $client = new SoapClient($serviceUrl, array('trace' => 1));
  ?>

<div class="hero_area">

<div class="hero_bg_box">
  <div class="bg_img_box">
    <img src="images/hero-bg.png" alt="">
  </div>
</div>

<!-- header section strats -->
<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.php">
        <span>
          Finexo
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""> </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="team.html">Team <span class="sr-only">(current)</span> </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<!-- end header section -->
</div>


  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2>
          <span>Notre</span> service<span>s</span> SOUP
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/slider-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            
            <section class="info_section layout_padding2">

              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-lg-6 info_col ">
                    <h4>
                      Crée un Compte
                    </h4>

                    <?php
                      if(isset($_GET['addCompt']) && isset($_GET['solde1']) && isset($_GET['code1']) ){
                        // Appel de la méthode addCompt
                        $code = intval($_GET['code1']);
                        $solde = floatval($_GET['solde1']);
                        $param = array('code' => $code, 'solde' => $solde);
                        $resultatAddCompt = $client->addCompt($param);

                        echo "<script language='javascript'>  alert(".$code." ".$solde."); </script>";

                      }
                    ?>

                    <form action="about.php" method="GET">
                      <input type="text" value="addCompt" name="addCompt" hidden>
                      <input type="text" name="code1" placeholder="Enter le Code" >
                      <input type="text" name="solde1" placeholder="Enter le Solde" >
                    
                      <button type="submit">
                        Ajouter
                      </button>

                    </form>
                  </div>
                </div>
              </div>
            </section>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>

        <div class="col-md-3">
          <section class="info_section layout_padding2">
            <div class="container">
              <div class="row">
                <div class="info_col ">
                  <h4>
                    conversion Dt - Er
                  </h4>

                  <?php
                  
                    $resultatConversion1 = null;
                    
                    if(isset($_GET['convertir1']) && isset($_GET['montantCDT'])){
                      
                      // Appel de la méthode conversionDtToEr
                      $montantEnDt = floatval($_GET['montantCDT']);
                      $params = array('x' => $montantEnDt);
                      $resultatConversion = $client->conversionDtToEr($params);
                      // Accédez aux propriétés correctement
                      //print "Conversion de $montantEnDt DT en Euro : " . $resultatConversion->return . " Euro\n";
                    }

                  ?>

                  <form action="about.php" method="GET">
                    <input type="text" value="convertir1" name="convertir1" hidden>
                    <input type="text" placeholder="montant à convertir en DT" name="montantCDT" />
                    <br>
                    <br>
                    <button type="submit">
                      Convertir
                    </button>
                    <br>
                    <br>
                    <?php
                      if(isset($resultatConversion)){
                        echo '<input type="text" placeholder="'. $resultatConversion->return .' €" name="montantCe"  disabled/>';
                      }
                      else{
                        echo '<input type="text" placeholder="montant en €" name="montantCe" disabled/>';
                      }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="col-md-3">
          <section class="info_section layout_padding2">
            <div class="container">
              <div class="row">
                <div class=" info_col ">
                  <h4>
                    conversion Er - Dt
                  </h4>

                  <?php
                  
                  $resultatConversion2 = null;
                  
                  if(isset($_GET['convertir2']) && isset($_GET['montantCER']) ){
                    
                    $montantEnEr = floatval($_GET['montantCER']);
                    $params = array('x' => $montantEnEr);
                    $resultatConversion2 = $client->conversionErToDt($params);
                  }

                ?>
                  <form action="about.php" method="GET">
                    <input type="text" value="convertir2" name="convertir2" hidden>
                    <input type="text" placeholder="montant à convertir en €" name="montantCER" />
                    <br>
                    <br>
                    <button type="submit">
                      Convertir
                    </button>
                    <br>
                    <br>

                    <?php
                      if(isset($resultatConversion2)){
                        echo '<input type="text" placeholder="'. $resultatConversion2->return .' DT" name="montantCe"  disabled/>';
                      }
                      else{
                        echo '<input type="text" placeholder="montant en DT" name="montantCe" disabled/>';
                      }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div> 

      </div>
    </div>
  </section>


  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        
      <?php
        if(isset($_GET['getAll'])){

          // Appel de la méthode getAllCompts
          $resultatComptes = $client->getAllCompts();

          // Vérifiez si la propriété getAllComptsResult existe avant de l'utiliser
          if (isset($resultatComptes->return)) {
            print '<table style="width:100%">
                  <tr>
                    <td>Code</td>
                    <td>Solde</td>
                    <td>Date de Création</td>
                  </tr>';

              foreach ($resultatComptes->return as $compte) {
                print "<tr><td>$compte->code</td><td>$compte->solde</td><td>$compte->date_cre</td></tr>";
              }
              print "</table>";
          } else {
              echo "<p>Aucun compte trouvé. </p>";
          }
        }
      ?>


        <div class="col-md-3">  
          <section class="info_section layout_padding2">
            <div class="container">
              <div class="row">
                <div class=" info_col ">

                  <form action="about.php" method="GET">
                    <input type="text" value="getAll" name="getAll" hidden>
                    <button type="submit">
                      Afficher les comptes
                    </button>
                  </form>

                </div>
              </div>
            </div>
          </section>
        </div>

      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://jilani-med.web.app/">JILANI MOHAMED</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>