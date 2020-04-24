<?php
require_once 'bd.php';

    function genererNumLoc()
    {
        $id = lastInsertIdForTable("locataire");
        if($id < 10)
            $numero = "MKB_CL_000".$id;
        else
            $numero = "MKB_CL_00".$id;
        return $numero;
    }

    function insererLocataire($num, $nom, $prenom, $tel)
    {
        $id = lastInsertIdForTable("locataire");
        $sql = "INSERT INTO locataire VALUES($id, '$num', '$nom', '$prenom', '$tel' )";
        echo $sql;
        global $bd;
        $test  =  $bd->exec($sql);
        if($test > 0)
            return $id;
        else
            return 0;
    }

    function louer($idLocataire, $idChambre)
    {
        $id = lastInsertIdForTable("louer");
        $sql = "INSERT INTO louer VALUES($id, $idLocataire, $idChambre )";
        global $bd;
        return $bd->exec($sql);
    }
    function occuper($dateDeb, $dateFin, $montant, $idLocataire, $idChambre)
    {
        $id = lastInsertIdForTable("occuper");
        $sql = "INSERT INTO occuper VALUES($id, '$dateDeb', '$dateFin', '$montant' , $idLocataire, $idChambre, 0 )";
        echo $sql;
        //die();
        global $bd;
        return $bd->exec($sql);
    }

    function getAllLocataire()
    {
        $sql = "SELECT L.*, C.adresse, C.montant FROM locataire L, louer LO, chambre C  WHERE LO.idLocataire = L.id AND LO.idChambre = C.id ";
        global $bd;
        return $bd->query($sql)->fetchAll();
    }
    function getAllPassagers()
    {
        $sql = "SELECT L.*, C.adresse, O.dateDebut, O.dateFin, O.montant, O.statut FROM locataire L, occuper O, chambre C  WHERE O.idLocataire = L.id AND O.idChambre = C.id ";
        global $bd;
        return $bd->query($sql)->fetchAll();
    }