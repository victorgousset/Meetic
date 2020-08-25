<?php
session_start();
if(isset($_SESSION['mail']))
{
    header('Location: profil.php?error=co');
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<br><br>

<section class="connexion">
    <div class="titre_form_register">
        <h1>CONNEXION</h1>
    </div>

    <br><br>
    <?php
        require "include/Errors.php";
        new Errors();
    ?>
    <div class="alert alert-danger" id="result">

    </div>

    <form method="POST" class="form_inscription col col-8" id="my_form">
        <label>Mail: </label><br><input type="email" name="login" class="form-control" id="login"><br>
        <label>Mot de passe: </label><br><input type="password" name="mdp" class="form-control" id="mdp"><br>
        <input type="submit" name="submit" id="submit_login" class="btn btn-danger" value="Se connecter">
    </form>
</section>

<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#result').fadeToggle("fast");

        $('#my_form').on('submit', function(e){
            e.preventDefault();
            $('#result').fadeIn();

            var login = $('#login').val();
            var mdp = $('#mdp').val();

            if(login == ""){
                $("#result").fadeIn().text("Mail manquant");
                $("#login").focus();
                return false;
            }
            if(mdp == ""){
                $("#result").fadeIn().text("Mot de passe manquant");
                $("#mdp").focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: 'Handler/LoginHandler.php',
                data: {login: login, mdp: mdp},
                success: function(data){
                    $("#result").html(data);

                }
            });
        });
    });
</script>

</body>
</html>