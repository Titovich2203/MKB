<?php
    session_start();
    require_once '../model/chambreBd.php';
    if(isset($_POST['ajoutChambre']))
    {
        extract($_POST);
        $idUser = $_SESSION['idUser'];
        if (insererChambre($numero, $adresse,  $montant,  $typeCh, $idUser) > 0)
        {
            header('location:/MKB/addRoomS');
        }
        else
        {
            header('location:/MKB/addRoomE');
        }
    }