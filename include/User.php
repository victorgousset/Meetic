<?php


class User
{

    public function __construct()
    {
        $this->isConnected();
    }

    public function isConnected()
    {
        if(!isset($_SESSION['mail']))
        {
            header('Location: login.php?error=NoConnected');
        }
    }

    public function getProfil()
    {
            echo "<strong>-Prenom: </strong>". $_SESSION['prenom'] ."<br>";
            echo "<strong>-Nom: </strong>".  $_SESSION['nom'] ."<br>";
            echo "<strong>-Date de naissance: </strong>".  $_SESSION['date_naissance'] . "<br>";
            echo "<strong>-email: </strong>"  .$_SESSION['mail'] ."<br>";
            echo "<strong>-Genre: </strong>" . $_SESSION['genre'] . "<br>";
            echo "<strong>-ville: </strong>" . $_SESSION['ville'] . "<br>";
            echo "<strong>-Loisir: </strong>" . $_SESSION['loisir']."<br>";
            echo "<strong>-Date d'inscription: </strong>".  $_SESSION['date_inscription'] ."<br>";
    }

    public function getPrenom()
    {
        echo $_SESSION['prenom'] . ",<br>";
    }

    public function isActivate($bdd, $id)
    {
        $req = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();
        if($result['active'] == 1)
        {
            header('Location: login.php?error=NoActive');
        }
    }

    public function isAdmin($bdd, $id)
    {
        $req = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();
        if($result['admin'] != 1)
        {
            header('Location: ../login.php?error=NoAdmin');
        }
    }

    public function btn_admin($bdd, $id)
    {
        $req = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();
        if($result['admin'] == 1)
        {
            return true;
        }
        return null;
    }

    public function desactive($bdd, $id)
    {
        $status = htmlspecialchars($_GET['status']);
        if($status == "desactive")
        {
            $req = $bdd->prepare("UPDATE membre SET active = 1 WHERE id = ?");
            $req->execute(array($id));
            session_destroy();
            header('Location: login.php?error=Desactive');
        }
    }

    public function getInfoUser($bdd)
    {
        if(isset($_GET['id']))
        {
            $id = htmlspecialchars($_GET['id']);
            $req = $bdd->prepare("SELECT * FROM membre WHERE id = ?");
            $req->execute(array($id));
            while($result = $req->fetch())
            {
                echo "<strong>-Prenom: </strong>". $result['prenom'] ."<br>";
                echo "<strong>-Age: </strong>".  $result['age'] . "<br>";
                echo "<strong>-Genre: </strong>" . $result['genre'] . "<br>";
                echo "<strong>-ville: </strong>" . $result['ville'] . "<br>";
                echo "<strong>-Loisir: </strong>" . $result['loisir'] . ", ";
                if($result['loisir2'] != null)
                {
                    echo $result['loisir2'] . ", ";
                }
                if($result['loisir3'] != null)
                {
                    echo $result['loisir3'];
                }

                $photo = $result['logo'];
                echo "<img src='logo/$photo' width='150' />";
            }

        } else {
            header('Location: search.php');
        }
    }

}