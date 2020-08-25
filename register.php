<?php
session_start();

if(isset($_SESSION['mail']))
{
    header('Location: profil.php?error=co');
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<br><br>

<section class="inscription">
    <div class="titre_form_register">
        <h1>INSCRIPTION</h1>
    </div>
    <br><br>

    <div class="alert alert-danger" id="result">

    </div>

    <form id="my_form_id" method="POST" class="form_inscription col col-8">
        <label>Nom: </label><input type="text" name="nom" placeholder="Nom" id="nom" class="form-control"><br>
        <label>Prenom: </label><input type="text" name="prenom" placeholder="Prenom" id="prenom" class="form-control"><br>
        <label>Date de naissance: </label><input type="date" name="ddn" id="date"><br><br>
        <label>Genre: </label><select name="genre" id="genre">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select><br>
        <label>Ville: </label><input type="text" name="ville" placeholder="Ville" id="ville" class="form-control"><br>
        <label>Email: </label><input type="email" name="mail" placeholder="Adresse email" id="mail" class="form-control"><br>
        <label>Mot de passe: </label><input type="password" name="password" placeholder="Mot de passe" id="mdp" class="form-control"><br>
        <label>Confirmation du mot de passe: </label><input type="password" name="password_confirm" placeholder="Confirmation du mot de passe" id="mdp_confirm" class="form-control"><br>
        <label>Loisir: </label><select name="loisir" id="loisir">
            <option value="sport">Sport</option>
            <option value="cinema">Cinema</option>
        </select><br><br>
        <input type="submit" name="submit" id="submit_register" class="btn btn-danger" value="S'inscrire">

    </form>
</section>

<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#result').fadeToggle("fast");

        $('#my_form_id').on('submit', function(e){
            e.preventDefault();
            $('#result').fadeIn();

            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var date = $('#date').val();
            var genre = $('#genre').val();
            var ville = $('#ville').val();
            var mail = $('#mail').val();
            var mdp = $('#mdp').val();
            var mdp_confirm = $('#mdp_confirm').val();
            var loisir = $('#loisir').val();

            if(nom == ""){
                $("#result").fadeIn().text("Nom manquant");
                $("#nom").focus();
                return false;
            }
            if(prenom == ""){
                $("#result").fadeIn().text("Prenom manquant");
                $("#prenom").focus();
                return false;
            }
            if(date == ""){
                $("#result").fadeIn().text("Date manquante");
                $("#date").focus();
                return false;
            }
            if(genre == ""){
                $("#result").fadeIn().text("Genre manquant");
                $("#genre").focus();
                return false;
            }
            if(ville == ""){
                $("#result").fadeIn().text("Ville manquante");
                $("#ville").focus();
                return false;
            }
            if(mail == ""){
                $("#result").fadeIn().text("Mail manquant");
                $("#mail").focus();
                return false;
            }
            if(mdp == ""){
                $("#result").fadeIn().text("Mot de passe manquant");
                $("#mdp").focus();
                return false;
            }
            if(mdp_confirm == ""){
                $("#result").fadeIn().text("Confirmation du mot de passe manquant");
                $("#mdp_confirm").focus();
                return false;
            }
            if(mdp != mdp_confirm){
                $("#result").fadeIn().text("Les mots de passes ne correspondent pas");
                $("#mdp").focus();
                return false;
            }
            if(loisir == ""){
                $("#result").fadeIn().text("Loisir manquant");
                $("#loisir").focus();
                return false;
            }
            $.ajax({
                type: "POST",
                url: 'Handler/RegisterHandler.php',
                data: {nom: nom, prenom: prenom, date: date, genre: genre, ville: ville, mail: mail, mdp: mdp, mdp_confirm: mdp_confirm, loisir: loisir},
                success: function(data){
                    $("#result").html(data);

                }
            });
        });
    });
</script>

</body>
</html>