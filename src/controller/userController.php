<?php
    session_start();
    require_once '../model/modelUser.php';
    if (isset($_POST['connexion']))
    {
        //insererUser("VICH", "TITO", "vich", password_hash("passer2019", PASSWORD_DEFAULT), "admin");
        extract($_POST);
        $user = verifierConnexion($login, $mdp);
        if($user != null)
        {
            if($user['statut'] == '1'){
                $_SESSION['profil'] = $user['profil'];
                $_SESSION['nomComplet'] = $user['nom'].' '.$user['prenom'];
                $_SESSION['idUser'] = $user['id'];
                header('location:/MKB/accueil');
            }
            else
            {
                $_SESSION['idUser'] = $user['id'];
                header('location:/MKB/preAccueil');
            }
        }
        else
        {
            //insererUser("OK", "OK", "OK", password_hash("OK",PASSWORD_DEFAULT), "admin");
            header('location:/MKB/errorConnexion');
            return;
        }

    }
    if (isset($_GET['deconnexion']))
    {
        session_unset();
        $_SESSION = array();
        header('location:/MKB/');
    }
    if (isset($_POST['ajoutUser'])) {
        extract($_POST);
        if (strlen($mdp) < 8) {
            header('location:/MKB/newUserC');
        }
        else
        {
            $profil = "admin";
            if(insererUser($nom, $prenom, $login, password_hash($mdp, PASSWORD_DEFAULT), $profil) > 0)
            {
                header('location:/MKB/newUserS');
            }
            else
            {
                header('location:/MKB/newUserE');
            }
        }
    }
    if (isset($_POST['changeMdp'])) {
        extract($_POST);
        $ancienMdp = getPasswordById($_SESSION['idUser']);
        if (strlen($mdp) >= 8) {
            if(password_verify($mdp,$ancienMdp['mdp']))
            {
                header('location:/MKB/preAccueil');
            }
            else
            {
                if(chamgeMdpById($_SESSION['idUser'], password_hash($mdp, PASSWORD_DEFAULT)) > 0)
                {
                    $user = getUserById($_SESSION['idUser']);
                    $_SESSION['profil'] = $user['profil'];
                    $_SESSION['nomComplet'] = $user['nom'].' '.$user['prenom'];
                    $_SESSION['idUser'] = $user['id'];
                    header('location:/MKB/accueil');

                }
                else
                {
                    header('location:/MKB/preAccueil');
                }
            }
        }
        else
        {
            header('location:/MKB/preAccueil');
        }
    }
    
?>