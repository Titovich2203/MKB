<?php
    require_once 'bd.php';

    function genererNumCh()
    {
        $id = lastInsertIdForTable("chambre");
        if($id < 10)
        $numero = "MKB_CH_000".$id;
        else
            $numero = "MKB_CH_00".$id;
        return $numero;
    }

    function getTypesCh()
    {
        $sql = "SELECT libelle FROM typechambre";
        global $bd;
        return $bd->query($sql)->fetchAll();
    }
    function getIdTypeCh($libelle)
    {
        $sql = "SELECT id FROM typechambre WHERE libelle = '$libelle'";
        global $bd;
        return $bd->query($sql)->fetch();
    }

    function insererChambre($numero, $adresse,  $montant,  $typeCh, $idUser)
    {
        $id = lastInsertIdForTable("chambre");
        $idTypeCh =  getIdTypeCh($typeCh)['id'];
        $sql = "INSERT INTO chambre VALUES($id, '$numero', '$adresse', $montant, $idTypeCh, $idUser)";
        global $bd;
        return $bd->exec($sql);
    }

    function getAllChambres()
    {
        $sql = "SELECT C.*, T.libelle FROM chambre C, typechambre T WHERE C.idTypeChambre = T.id";
        global $bd;
        return $bd->query($sql)->fetchAll();
    }

    function getIdChByNum($num)
    {
        $sql = "SELECT id FROM chambre WHERE numero = '$num'";
        global $bd;
        return $bd->query($sql)->fetch()['id'];
    }

    function isMeuble($num)
    {
        $sql = "SELECT idTypeChambre FROM chambre WHERE numero = '$num'";
        global $bd;
        $idTypeCh = $bd->query($sql)->fetch()['idTypeChambre'];
        if($idTypeCh == '1')
        {
            return true;
        }
        else
        {
            return false;
        }
    }