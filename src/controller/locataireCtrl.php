<?php
    require_once '../model/locataireBd.php';
    require_once '../model/chambreBd.php';

    if(isset($_POST['addLocataire']))
    {
        var_dump($_POST);
        extract($_POST);
        $tel = $ind.$tel;
        $idLoca = insererLocataire($numLoc, $nom, $prenom, $tel);
        if($idLoca > 0)
        {
            if(isMeuble($choixChambre))
            {
                if(occuper($dateDebut, $dateSortie, $montant, $idLoca, getIdChByNum($choixChambre)) > 0)
                {
                    header('location:/MKB/addLocataireS');
                }
                else
                {
                    header('location:/MKB/addLocataireE');
                }
            }
            else
            {
                if(louer($idLoca,getIdChByNum($choixChambre)) > 0)
                {
                    header('location:/MKB/addLocataireS');
                }
                else
                {
                    header('location:/MKB/addLocataireE');
                }
            }
        }
    }