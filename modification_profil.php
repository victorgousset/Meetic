<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require "include/Database.php";
require "include/User.php";
require "include/User_modification.php";

$db = new Database();
$bdd = $db->getPDO();

$user = new User();
$user_update = new User_modification($bdd);

    $id_membre = $_SESSION['id'];
    $logo = new User_modification($bdd);
    $logo->updateLogo($id_membre);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Modification du profil</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<br><br>

<section class="form_modif_profil">
    <div class="alert alert-danger" id="result">

    </div>

    <h1 class="title_modif_profil">Modifier mon profil</h1>
    <form method="POST" id="form_info_perso">
        <label>Prenom: </label><input type="text" name="prenom" class="form-control" value="<?= $_SESSION['prenom'] ?>" id="prenom"><br>
        <label>Nom: </label><input type="text" name="nom" class="form-control" value="<?= $_SESSION['nom'] ?>" id="nom"><br>
        <label>Date de naissance: </label><input type="text" name="date_naissance" class="form-control" value="<?= $_SESSION['date_naissance'] ?>" id="date_naissance"><br>
        <label>mail: </label><input type="email" name="mail" class="form-control" value="<?= $_SESSION['mail'] ?>" id="mail"><br>
        <label>Genre: </label><select name="genre" id="genre">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
            <option value="autre">Autre</option>
        </select><br>
        <label>Ville: </label><input type="text" name="ville" class="form-control" value="<?= $_SESSION['ville'] ?>" id="ville"><br>
        <input type="submit" class="btn btn-primary" value="Modifier mon profil">
    </form>

    <br><br>

    <h1 class="title_modif_profil">Ajouter/Supprimer des loisirs: 3max.</h1>
    <div class="alert alert-danger" id="result_loisir"></div>
    <form method="POST" id="form_loisir">
        <?php $user_update->getLoisir(); ?>
        <input type="submit" class="btn btn-primary" value="Modifier mes loisirs">
    </form>

    <br><br>

    <h1 class="title_modif_profil">Modification du mot de passe</h1>
    <div class="alert alert-danger" id="result_password"></div>
    <form method="POST" id="form_password">
        <input type="password" class="form-control" id="password" placeholder="Mot de passe"><br>
        <input type="password" class="form-control" id="password_confirm" placeholder="Confirmation du mot de passe"><br>
        <input type="submit" class="btn btn-primary" id="submit_password">
    </form>

    <br><br>

    <h1 class="title_modif_profil">Modification de la photo</h1>
    <div class="alert alert-danger" id="result_logo"></div>
    <form method="POST" id="form_logo" enctype="multipart/form-data">
        <input type="file" name="avatar" id="file_id"><br>
        <input type="submit" class="btn btn-primary" id="submit_logo" name="submit_logo">
    </form>

</section>



<!--
Chose a faire:

- Terminer formulaire
- Gerer le nbr de loisir
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="include/menu.js"></script>
<script>
    $(document).ready(function() {
        $('#result').fadeToggle("fast");
        $('#result_loisir').fadeToggle("fast");
        $('#result_password').fadeToggle("fast");
        $('#result_logo').fadeToggle("fast");


        $('#form_info_perso').on('submit', function (e) {
            e.preventDefault();
            $('#result').fadeIn();

            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var mail = $('#mail').val();
            var ville = $('#ville').val();
            var genre = $('#genre').val();
            var date_naissance = $('#date_naissance').val();

            if(prenom == ""){
                $("#result").fadeIn().text("Nom manquant");
                $("#prenom").focus();
                return false;
            }
            if(nom == ""){
                $("#result").fadeIn().text("Nom manquant");
                $("#nom").focus();
                return false;
            }
            if(mail == ""){
                $("#result").fadeIn().text("Mail manquant");
                $("#mail").focus();
                return false;
            }
            if(ville == ""){
                $("#result").fadeIn().text("Ville manquant");
                $("#ville").focus();
                return false;
            }
            if(date_naissance == ""){
                $("#result").fadeIn().text("Date de naissance manquante");
                $("#date_naissance").focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: 'Handler/UpdateProfilHandler.php',
                data: {nom: nom, prenom: prenom, date_naissance: date_naissance, genre: genre, ville: ville, mail: mail},
                success: function(data){
                    $("#result").html(data);

                }
            });
        });

        var cb = document.querySelectorAll("[type=checkbox]");
        var i = 0,
            l = cb.length;

        for (; i<l; i++)
            cb[i].addEventListener("change", function (){
                if (document.querySelectorAll(":checked").length > 4) {
                    this.checked = false;
                    $("#result_loisir").fadeIn().text("3 Loisirs maximum");
                }
            }, false);

        $("#form_loisir").on("submit", function (e) {
            e.preventDefault();
            $('#result_loisir').fadeIn();

            var loisir = [];

            $.each($("input[name='loisir']:checked"), function(){
                loisir.push($(this).attr('id'));
            });

            $.ajax({
                type: "POST",
                url: 'Handler/UpdateProfilHandler_loisir.php',
                data: {loisir: loisir},
                success: function(data){
                    $("#result_loisir").html(data);

                }
            });
        });

        $("#form_password").on('submit', function (e) {
            e.preventDefault();
            $('#result_password').fadeIn();

            var p = $("#password").val();
            var c = $("#password_confirm").val();

            if(p == "") {
                $("#result_password").fadeIn().text("Champ non remplis");
                $("#password").focus();
                return false;
            }

            if(c == "") {
                $("#result_password").fadeIn().text("Champ non remplis");
                $("#password_confirm").focus();
                return false;
            }

            if(p !== c) {
                $("#result_password").fadeIn().text("Les mots de passes ne correspondent pas");
                $("#password_confirm").focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: 'Handler/UpdateProfilHandler_password.php',
                data: {password: p, password_confirm: c},
                success: function(data){
                    $("#result_password").html(data);

                }
            })
        });
    });
</script>
</body>
</html>