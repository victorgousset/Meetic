<?php

class Register
{
    private $nom;
    private $prenom;
    private $ddn;
    private $genre;
    private $ville;
    private $mail;
    private $mdp;
    private $mdp_confirm;
    private $loisir;

    private $bdd;

    public function __construct($bdd)
    {
            $this->bdd = $bdd;

            $this->nom = htmlspecialchars($_POST['nom']);
            $this->prenom = htmlspecialchars($_POST['prenom']);
            $this->ddn = $_POST['date'];
            $this->genre = $_POST['genre'];
            $this->ville = htmlspecialchars($_POST['ville']);
            $this->mail = htmlspecialchars($_POST['mail']);
            $this->mdp = htmlspecialchars(sha1($_POST['mdp']));
            $this->mdp_confirm = htmlspecialchars(sha1($_POST['mdp_confirm']));
            $this->loisir = $_POST['loisir'];
    }

    public function getErros()
    {

        $error = "";

        if (empty($this->nom) OR empty($this->prenom) OR empty($this->ddn) OR empty($this->genre) OR empty($this->ville)
            OR empty($this->mail) OR empty($this->mdp) OR empty($this->mdp_confirm)
            OR empty($this->loisir))
        {
            $error = "Tous les champs ne sont pas remplis". "<br>";
            echo $error;
        }

        if($this->mdp != $this->mdp_confirm)
        {
            $error = "Les mots de passes ne correspondent pas" . "<br>";
            echo $error;
        }

        if (!empty($this->ddn))
        {
            $date_now = strtotime(date("Y-m-d"));
            $date_ddn = strtotime($this->ddn);

            $diff_date = $date_now - $date_ddn;

            // Pour convertir le timestamp (secondes) en jours
            // On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
            $nbJour = $diff_date / 86400;

            if ($nbJour < 365)
            {
                $error = "Vous n'avez pas l'age necessaire pour vous inscrire" . "<br>";
                echo $error;
            }

            if ($date_ddn > $date_now)
            {
                $error = "la date de naissance inscrite est dans le futur" . "<br>";
                echo $error;
            }
        }

        if(!filter_var($this->mail, FILTER_VALIDATE_EMAIL))
        {
            $error = "L'adresse mail n'est pas valide " . "<br>";
            echo $error;
        }

        if(strlen($error) == 0) {
            $this->addUser();
        }

    }

    public function RowUser()
    {
        $req = $this->bdd->prepare("SELECT * FROM membre WHERE mail = ?");
        $req->execute(array($this->mail));
        return $req->rowCount();
    }

    public function calculAge($date)
    {
        $age = date('Y') - $date;
        if(date('md') < date('md', strtotime($date)))
        {
            return $age - 1;
        }
        return $age;
    }

    public function addUser()
    {
        if($this->RowUser() == 0)
        {
            $age = $this->calculAge($this->ddn);
            $req = $this->bdd->prepare("INSERT INTO membre(prenom, nom, date_naissance, age, genre, ville, mail, mdp, loisir, date_inscription) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            $req->execute(array($this->nom, $this->prenom, $this->ddn, $age, $this->genre, $this->ville, $this->mail, $this->mdp, $this->loisir));
            echo "Inscription valide ! Vous pouvez desormais vous connecter !";
            echo "<a href='login.php?error=registerSucces'>Se connecter</a>";
        } else {
            echo "Un autre compte utilise deja cet email";
        }
    }
}