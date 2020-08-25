<?php


class Login
{
    private $login;
    private $mdp;

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;

        $this->login = htmlspecialchars($_POST['login']);
        $this->mdp = htmlspecialchars(sha1($_POST['mdp']));
    }

    public function getErrors()
    {
        $error = "";

        if(empty($this->login) OR empty($this->mdp))
        {
            $error = "Tous les champs ne sont pas remplis" . "<br>";
            echo $error;
        }

        if(!filter_var($this->login, FILTER_VALIDATE_EMAIL))
        {
            $error = "L'adresse mail n'est pas valide " . "<br>";
            echo $error;
        }

        if(strlen($error) == 0)
        {
            $this->connectUser();
        }
    }


    public function verifUserExist()
    {
        $req = $this->bdd->prepare("SELECT * FROM membre WHERE mail = ? AND mdp = ?");
        $req->execute(array($this->login, $this->mdp));
        return $req->rowCount();
    }

    public function connectUser()
    {
        if($this->verifUserExist() == 1)
        {
            $req_fetch = $this->bdd->prepare("SELECT * FROM membre WHERE mail = ? AND mdp = ?");
            $req_fetch->execute(array($this->login, $this->mdp));
            $userInfo = $req_fetch->fetch();

            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['prenom'] = $userInfo['prenom'];
            $_SESSION['nom'] = $userInfo['nom'];
            $_SESSION['date_naissance'] = $userInfo['date_naissance'];
            $_SESSION['genre'] = $userInfo['genre'];
            $_SESSION['ville'] = $userInfo['ville'];
            $_SESSION['mail'] = $userInfo['mail'];
            $_SESSION['loisir'] = $userInfo['loisir'];
            $_SESSION['date_inscription'] = $userInfo['date_inscription'];
            $_SESSION['photo'] = $userInfo['logo'];

            echo "<script>document.location.href='profil.php';</script>";

        } else {
            echo "Email ou mot de passe incorrect";
        }
    }

}