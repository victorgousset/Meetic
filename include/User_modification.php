<?php


class User_modification
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getLoisir()
    {
        $req = $this->bdd->prepare("SELECT * FROM loisir");
        $req->execute();
        while ($result = $req->fetch())
        {
            echo "<label><input type='checkbox' name='loisir' id='checkbox_".$result['nom']."'>". $result['nom']."</label>";
        }
    }

    public function updateInfoPerso($prenom, $nom, $date_naissance, $ville, $genre, $mail, $id)
    {
        if(!empty($prenom) && !empty($nom) && !empty($date_naissance) && !empty($ville) && !empty($genre) && !empty($mail))
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $reqUpdate = $this->bdd->prepare("UPDATE membre SET prenom = ?, nom = ?, date_naissance = ?, genre = ?, ville = ?, mail = ? WHERE id = ?");
                $reqUpdate->execute(array($prenom, $nom, $date_naissance, $genre, $ville, $mail, $id));

                $msgSucces = "Modification effectue !";
                echo "<div class='alert alert-success' role='alert'>".$msgSucces."</div>";

                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['date_naissance'] = $date_naissance;
                $_SESSION['mail'] = $mail;
                $_SESSION['genre'] = genre;
                $_SESSION['ville'] = $ville;

            } else {
                echo "L'adresse email m'est pas valide";
            }
        } else {
            echo "Tous les champs ne sont pas remplis";
        }
    }

    public function updateLoisir($array, $id_membre)
    {
        $count = count($array);

        if($count == 1)
        {
            $first = substr($array[0], 9);

            $req = $this->bdd->prepare("UPDATE membre SET loisir = ? WHERE id = ?");
            $req->execute(array($first, $id_membre));

            $msgSucces = "Modification effectue ! Nouveau loisir: " . $array[0];
            echo "<div class='alert alert-success' role='alert'>".$msgSucces."</div>";
        }
        elseif ($count == 2)
        {
            $first = substr($array[0], 9);
            $second = substr($array[1], 9);

            $req = $this->bdd->prepare("UPDATE membre SET loisir = ?, loisir2 = ? WHERE id = ?");
            $req->execute(array($first, $second, $id_membre));

            $msgSucces = "Modification effectue ! Nouveaux loisirs " . $array[1];
            echo "<div class='alert alert-success' role='alert'>".$msgSucces."</div>";
        }
        elseif ($count == 3)
        {
            $first = substr($array[0], 9);
            $second = substr($array[1], 9);
            $third = substr($array[2], 9);

            $req = $this->bdd->prepare("UPDATE membre SET loisir = ?, loisir2 = ?, loisir3 = ? WHERE id = ?");
            $req->execute(array($first, $second, $third, $id_membre));

            $msgSucces = "Modification effectue ! Nouveaux loisirs " . $array[2];
            echo "<div class='alert alert-success' role='alert'>".$msgSucces."</div>";
        }
        elseif ($count != 1 && $count != 2 && $count != 3)
        {
            echo "Nombre de loisir incorrect";
        }
    }

    public function updatePassword($password, $password_confirm, $id_membre)
    {
        $p = htmlspecialchars(sha1($password));
        $c = htmlspecialchars(sha1($password_confirm));

        if($p == $c)
        {
            $req = $this->bdd->prepare("UPDATE membre SET mdp = ? WHERE id = ?");
            $req->execute(array($p, $id_membre));

            $msgSucces = "Modification effectue !";
            echo "<div class='alert alert-success' role='alert'>".$msgSucces."</div>";
        }
        else {
            echo "Les mots de passes ne correspondent pas !";
        }
    }


    public function updateLogo($id_perso)
    {
        if(isset($_POST['submit_logo']))
        {

            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name']))
            {
                $size_max = 22097152; // (en million)= 22Mo
                $extensions = array('jpg', 'png', 'jpeg');

                if($_FILES['avatar']['size'] <= $size_max)
                {
                    $VerifExtensions = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

                    if(in_array($VerifExtensions, $extensions))
                    {
                        $dest = 'logo/'.$id_perso.".".$VerifExtensions;
                        $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $dest);

                        if($result)
                        {
                            $img_bdd = $id_perso.".".$VerifExtensions;
                            $req = $this->bdd->prepare("UPDATE membre SET logo = ? WHERE id = ?");
                            $req->execute(array($img_bdd, $id_perso));

                            $_SESSION['photo'] = $img_bdd;

                            $msgSucces = "Photo de profil mise a jour";
                            echo "<div class='alert alert-success' role='alert'>".$msgSucces."</div>";
                        }
                    } else {
                        $msgEror = "L'extenson du fichier n'est pas valide";
                        echo "<div class='alert alert-danger' role='alert'>".$msgEror."</div>";
                    }
                } else {
                    $msgEror = "Le fichier est trop lourd";
                    echo "<div class='alert alert-danger' role='alert'>".$msgEror."</div>";
                }
            }  else {
                $msgEror = "Aucune image selectionne";
                echo "<div class='alert alert-danger' role='alert'>".$msgEror."</div>";
            }
        }
    }

}