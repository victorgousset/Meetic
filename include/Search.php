<?php


class Search
{

    private $bdd;

    private $genre;
    private $age;
    private $loisir;
    private $ville;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;

        $this->genre = $_POST['genre'];
        $this->ville = $_POST['ville'];
        $this->age = $_POST['age'];
        $this->loisir = $_POST['loisir'];
    }

    public function getLoisir()
    {
        $req = $this->bdd->prepare("SELECT * FROM loisir");
        $req->execute();
        while ($result = $req->fetch())
        {
            echo "<label><input type='checkbox' name='loisir' id='checkbox_".$result['nom']."' value='".$result['nom']."'>". $result['nom']."</label>";
        }
    }

    public function countElementGenre()
    {
        return $countGenre = count($this->genre);
    }

    public function countElementVille()
    {
        return $countVille = count($this->ville);
    }

    public function countElementLoisir()
    {
        return $countLoisir = count($this->loisir);
    }

    public function prepareRequestGenre()
    {
        $count = $this->countElementGenre();
        $request = "";

        if($count != 0)
        {
            $i = 0;
            for($i; $i < $count; $i++)
            {
                $request .= " genre = '" . $this->genre[$i] . "'";
            }
            return $request;
        }
        return null;
    }

    public function prepareRequestAge()
    {
        $request = "";

        if($this->age == 18)
        {
            $request .= " age BETWEEN '18' AND '25'";
            return $request;
        }
        elseif ($this->age == 25)
        {
            $request .= " age BETWEEN '25' AND '35'";
            return $request;
        }
        elseif ($this->age == 35)
        {
            $request .= " age BETWEEN '35' AND '45'";
            return $request;
        }
        elseif ($this->age == 45)
        {
            $request .= " age >= '45'";
            return $request;
        }
        return null;
    }

    public function prepareRequestLoisir()
    {
        $count = $this->countElementLoisir();
        $request = "";

        if($count != 0)
        {
            $i = 0;
            for($i; $i < $count; $i++)
            {
                $request .= " OR loisir = '" . $this->loisir[$i] . "' OR loisir2 = '" . $this->loisir[$i] . "' OR loisir3 = '" . $this->loisir[$i] . "'";
            }
            $req = substr($request, 3);
            return $req;
        }
        return null;
    }

    public function prepareRequestVille()
    {
        $c = $this->countElementVille();
        $request = "";

        if($c != 0)
        {
            $i = 0;
            for($i; $i < $c; $i++)
            {
                $request .= " ville = '". $this->ville[$i] . "' OR";
            }

            $req = substr($request, 0, -2);
            return $req;
        }
        return null;
    }

    public function assembleRequest()
    {
        $loisir = strlen($this->prepareRequestLoisir());
        $ville = strlen($this->prepareRequestVille());

        $request = "SELECT * FROM membre WHERE ";

        if($loisir != 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") AND (" . $this->prepareRequestLoisir() . ")";
            return $request;
        }
        elseif ($ville != 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") AND (" . $this->prepareRequestVille() . ")";
            return $request;
        }
        elseif($loisir != 0 && $ville != 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") AND (" . $this->prepareRequestLoisir() . ") AND (" . $this->prepareRequestVille() . ")";
            return $request;
        }
        elseif($loisir == 0 && $ville == 0)
        {
            $request .= $this->prepareRequestGenre() ." AND (". $this->prepareRequestAge() . ") ";
            return $request;
        }

        return null;
    }

    public function getResult()
    {
        $req = $this->bdd->prepare($this->assembleRequest());
        $req->execute();
        while($result = $req->fetch())
        {
            $photo = $result['logo'];
            $id = $result['id'];

            echo "<li class='slide'><a href='user_profil.php?id=$id'><img class='result_img' src='logo/$photo'></a></li>";
        }
    }

}