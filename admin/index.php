<?php
require '../include/User.php';
require '../include/Database.php';

session_start();

$id_membre = $_SESSION['id'];

$db = new Database();
$bdd = $db->getPDO();

$isadmin = new User();
$isadmin->isAdmin($bdd, $_SESSION['id']);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="../css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<br><br>

<div class="alert alert-danger" id="result">

</div>-

<br><br>

<section id="form_loisir">
    <h1 class="title_modif_profil">Ajouter un loisir</h1>
    <br><br>
    <form method="POST" id="my_form_loisir">
        <input type="text" name="nom" id="nom_loisir" class="form-control" placeholder="Nom du loisir">
        <input type="submit" class="btn btn-primary" value="Ajouter">
    </form>
</section>

<br><br>

<section>

</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#result').fadeToggle("fast");

        $('#my_form_loisir').on('submit', function (e) {
            e.preventDefault();
            $('#result').fadeIn();

            var loisir = $('#nom_loisir').val();

            if(loisir == ""){
                $("#result").fadeIn().text("Loisir manquant");
                $("#nom").focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: '../Handler/AdminHandler.php',
                data: {loisir: loisir},
                success: function(data){
                    $("#result").html(data);

                }
            });

        });

    });


</script>
</body>
</html>