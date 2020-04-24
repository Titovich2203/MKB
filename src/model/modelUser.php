<?php
    require_once 'bd.php';

    function verifierConnexion($login, $mdp)
    {
        $sql = "SELECT * FROM user WHERE login='$login' ";
        global $bd;
        $user = $bd -> query($sql) -> fetch();
        if($user == null)
        {
            return null;
        }
        else
        {
            if(password_verify($mdp, $user['mdp'])){
                return $user;
            }
            else
            {
                return null;
            }
        }
        // fetch permet de retourner un seul resultat
    }
    function insererUser($nom, $prenom, $login, $mdp, $profil)
    {
    	$id = lastInsertIdForTable('user');
    	$sql = "INSERT INTO user VALUES('$id', '$nom', '$prenom', '$login', '$mdp', '$profil', 0)";
    	global $bd;
    	return $bd -> exec($sql);
    }
    function getPasswordById($id)
    {
        $sql = "SELECT mdp FROM user WHERE id = '$id' ";
        global $bd;
        return $bd -> query($sql) ->fetch();
    }
    function chamgeMdpById($id, $mdp)
    {
        $sql = "UPDATE user set mdp='$mdp', statut=1 WHERE id='$id' ";
        global $bd;
        return $bd -> exec($sql);
    }
    function getUserById($id)
    {
        $sql = "SELECT * FROM user WHERE id = '$id' ";
        global $bd;
        return $bd -> query($sql) -> fetch();
    }
    function getUsers()
    {
        $sql = "SELECT * FROM user ";
        global $bd;
        return $bd -> query($sql) -> fetchall();
    }
?>