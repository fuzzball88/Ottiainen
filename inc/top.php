<!doctype html>
<?php
session_start();
    session_regenerate_id();

    $tietokanta = null;
    try {
        $tietokanta = new PDO("mysql:host=localhost;dbname=ottiainen;charset=utf8", "root", "");
        $tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $ex) {
        print "Häiriö tietokantayhteydessä.";
        exit;
    }
?>
<html lang="en">
  <head>
    <title>Öttiäinen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
     <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Zilla+Slab+Highlight" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">
    <link href="css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.min.css" rel="stylesheet">

    
    <!-- Bootstrap core CSS -->
    <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    
    <!-- Custom styles for this template -->
    <link href="css/full-width-pics.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
       <!-- Header - set the background image for the header in the line below -->
    <header class="py-5 bg-image-full" style="background-image: url('img/maatila.jpg'); height:350px;"> 
      <img class="img-fluid d-block mx-auto" src="img/ottiainen2.png" alt="">
      
    </header>
    

  
  </head>
  <body>
       
         <!-- Header - set the background image for the header in the line below --
    <header class="py-5 bg-image-full" style="background-image: url('https://bangkokculturaltours.com/wp-content/uploads/2016/02/bd.jpg');">
      <img class="img-fluid d-block mx-auto" src="http://placehold.it/200x200&text=Logo" alt="">
    </header> -->
       
       
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Öttiäinen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ruoka.php">Tietoa hyönteisruuasta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="valmistus.php">Tietoa valmistuksesta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lomake.php">Ota yhteyttä</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ostoskori.php">Verkkokauppa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kirjaudu.php">Kirjaudu</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
   