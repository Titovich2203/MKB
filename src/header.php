<?php
  session_start();
  if(!isset($_SESSION['nomComplet']))
  {
      header("location:/MKB/");
  }
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>MY KAZENG BUSINESS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/MKB/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/MKB/public/bootstrap/css/bootstrap.css">

    <link rel="stylesheet" type="text/css" href="/MKB/public/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="/MKB/public/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">-->

</head>
<body style="background-color: #dfdfdf">
    <div class="preloader" id="preloader">
        <div class="item">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="/MKB/accueil" >MKB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle text-white" style="font-size: 18px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          GESTION DES CHAMBRES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/MKB/listRoom">Listes des chambres</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/MKB/addRoom">Nouvelle chambre</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" style="font-size: 18px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          GESTION DES LOCATAIRES
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/MKB/listLocataire">Listes des locataires</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/MKB/addLocataire">Nouveau locataire</a>
        </div>
      </li>

        <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle text-white" style="font-size: 18px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                GESTION DE LA DISPONIBILITE
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/MKB/GestClient">Meublés</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/MKB/newCompte">Non Meublés</a>
            </div>
        </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" style="font-size: 18px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          GESTION DES USERS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/MKB/newUser">Nouveau utilisateur</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/MKB/listeUser">Liste des utilisateurs</a>
        </div>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" style="font-size: 18px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>
        <a href="/MKB/deconnexion" class="deco"><button class="btn btn-outline-danger items-align-end ">DECONNEXION</button></a>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
<div id="pageElleMeme">