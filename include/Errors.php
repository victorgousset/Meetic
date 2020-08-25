<?php


class Errors
{
    private $error;

    public function __construct()
    {
        if(isset($_GET['error'])) {
            $this->error = htmlspecialchars($_GET['error']);
        }

        $this->echo_error();
    }

    public function echo_error() {
        if($this->error == "registerSucces")
        {
            echo "<div class='alert alert-success'>" . "Votre compte a bien ete creer, vous pouvez desormais vous connecter" . "</div><br>";
        }
        elseif($this->error == "NoConnected")
        {
            echo "<div class='alert alert-warning'>" . "Vous devez etre connecte pour acceder a cette page" . "</div><br>";
        }
        elseif ($this->error == "NoActive")
        {
            echo "<div class='alert alert-warning'>" . "Votre compte est desactive" . "</div><br>";
        }
        elseif ($this->error == "NoAdmin")
        {
            echo "<div class='alert alert-danger'>" . "Votre n'avez pas acces a cette page" . "</div><br>";
        }
        elseif ($this->error == "Desactive")
        {
            echo "<div class='alert alert-danger'>" . "Votre compte est maintenant desacive" . "</div><br>";
        }
        elseif ($this->error == "co")
        {
            echo "<div class='alert alert-danger'>" . "Vous etes deja connecte" . "</div><br>";
        }
    }
}