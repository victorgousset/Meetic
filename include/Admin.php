<?php

class Admin
{

    private $bdd;
    private $id;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
        $this->id = $_SESSION['id'];
    }

    public function isAdmin()
    {
        $req = $this->bdd->prepare("SELECT * FROM membre WHERE id = ?");
        $req->execute(array($this->id));
        $result = $req->fetch();
        if($result['admin'] != 1)
        {
            header('Location: ../login.php?error=NoAdmin');
        }
    }

    public function setLoisir($loisir)
    {
        $req = $this->bdd->prepare("INSERT INTO loisir(nom) VALUES (?)");
        $req->execute(array($loisir));
        echo "Le loisir a bien ete ajoute !";
    }

}

