<?php
require 'include/Database.php';
require 'include/Search.php';
require 'include/User.php';

    session_start();
    $db = new Database();
    $bdd = $db->getPDO();

new User();
$s = new Search($bdd);

include "include/menu.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Recherche</title>
    <link rel="stylesheet" href="css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="section_recherche">

<div class="alert alert-danger" id="result">

</div>

    <form method="POST" id="form">
        <p class="p_form_recherche">Par genre: </p>
        <label><input type="checkbox" id="checkbox_genre" name="genre" value="homme">Homme</label>
        <label><input type="checkbox" id="checkbox_genre" name="genre" value="femme">Femme</label>
        <label><input type="checkbox" id="checkbox_genre" name="genre" value="autre">Autre</label>
    <br><br>

        <br>

        <br><p class="p_form_recherche">Par Loisir: </p>
        <?php
            $s->getLoisir();
        ?>


        <br>

    <p class="p_form_recherche">Par age:</p>
    <label for="age"></label><select id="age">
        <option value="18">18-25</option>
        <option value="25">25-35</option>
        <option value="35">35-45</option>
        <option value="45">45+</option>
    </select>


        <p class="p_form_recherche">Par Localisation: </p>
        <label><input type="checkbox" name="ville" value="bourg">Bour-en-Bresse (01)</label>
        <label><input type="checkbox" name="ville" value="laon">Laon (02)</label>
        <label><input type="checkbox" name="ville" value="moulins">Moulins (03)</label>
        <label><input type="checkbox" name="ville" value="digne">Digne (04)</label>
        <label><input type="checkbox" name="ville" value="gap">Gap (05)</label>
        <label><input type="checkbox" name="ville" value="nice">Nice (06)</label>
        <label><input type="checkbox" name="ville" value="privas">Privas (07)</label>
        <label><input type="checkbox" name="ville" value="charleville">Charleville-Mézières (08)</label>
        <label><input type="checkbox" name="ville" value="foix">Foix (09)</label>
        <label><input type="checkbox" name="ville" value="troyes">Troyes (10)</label>
        <label><input type="checkbox" name="ville" value="carcassonne">Carcassonne (11)</label>
        <label><input type="checkbox" name="ville" value="rodez">Rodez (12)</label>
        <label><input type="checkbox" name="ville" value="marseille">Marseille (13)</label>
        <label><input type="checkbox" name="ville" value="caen">Caen (14)</label>
        <label><input type="checkbox" name="ville" value="aurillac">Aurilac (15)</label>
        <label><input type="checkbox" name="ville" value="angouleme">Angoulême (16)</label>
        <label><input type="checkbox" name="ville" value="larochelle">La Rochelle (17)</label>
        <label><input type="checkbox" name="ville" value="bourges">Bourges (18)</label>
        <label><input type="checkbox" name="ville" value="tulle">Tulle (19)</label>
        <label><input type="checkbox" name="ville" value="ajaccio">Ajaccio (2A)</label>
        <label><input type="checkbox" name="ville" value="bastia">Bastia (2B)</label>
        <label><input type="checkbox" name="ville" value="dijon">Dijon (21)</label>
        <label><input type="checkbox" name="ville" value="saintbrieuc">Saint-Brieuc (22)</label>
        <label><input type="checkbox" name="ville" value="gueret">Guéret (23)</label>
        <label><input type="checkbox" name="ville" value="perigueux">Périgueux (24)</label>
        <label><input type="checkbox" name="ville" value="besancon">Besançon (25)</label>
        <label><input type="checkbox" name="ville" value="lille">Valence (26)</label>
        <label><input type="checkbox" name="ville" value="evreux">Evreux (27)</label>
        <label><input type="checkbox" name="ville" value="chartres">Chartres (28)</label>
        <label><input type="checkbox" name="ville" value="quimper">Quimper (29)</label>
        <label><input type="checkbox" name="ville" value="nimes">Nîmes (30)</label>
        <label><input type="checkbox" name="ville" value="toulouse">Toulouse (31)</label>
        <label><input type="checkbox" name="ville" value="auch">Auch (32)</label>
        <label><input type="checkbox" name="ville" value="bordeaux">Bordeaux (33)</label>
        <label><input type="checkbox" name="ville" value="montpellier">Montpellier (34)</label>
        <label><input type="checkbox" name="ville" value="rennes">Rennes (35)</label>
        <label><input type="checkbox" name="ville" value="chateauroux">chateauroux (36)</label>
        <label><input type="checkbox" name="ville" value="tours">Tours (37)</label>
        <label><input type="checkbox" name="ville" value="grenoble">Grenoble (38)</label>
        <label><input type="checkbox" name="ville" value="lons">Lons-le-Saunier (39)</label>
        <label><input type="checkbox" name="ville" value="montdemarsan">Mont-de-Marsan (40)</label>
        <label><input type="checkbox" name="ville" value="blois">Blois (41)</label>
        <label><input type="checkbox" name="ville" value="saintetienne">Saint-Etienne (42)</label>
        <label><input type="checkbox" name="ville" value="lepuyenvelay">Le Puy-en-Velay (43)</label>
        <label><input type="checkbox" name="ville" value="nantes">Nantes (44)</label>
        <label><input type="checkbox" name="ville" value="orleans">Orléans (45)</label>
        <label><input type="checkbox" name="ville" value="cahors">Cahors (46)</label>
        <label><input type="checkbox" name="ville" value="agen">Agen (47)</label>
        <label><input type="checkbox" name="ville" value="mende">Mende (48)</label>
        <label><input type="checkbox" name="ville" value="angers">Angers (49)</label>
        <label><input type="checkbox" name="ville" value="saintlo">Saint-Lô (50)</label>
        <label><input type="checkbox" name="ville" value="chalons">Châlons-en-Champagne (51)</label>
        <label><input type="checkbox" name="ville" value="chaumont">Chaumont (52)</label>
        <label><input type="checkbox" name="ville" value="laval">Laval (53)</label>
        <label><input type="checkbox" name="ville" value="nancy">Nancy (54)</label>
        <label><input type="checkbox" name="ville" value="barleduc">Bar-le-Duc (55)</label>
        <label><input type="checkbox" name="ville" value="vannes">Vannes (56)</label>
        <label><input type="checkbox" name="ville" value="metz">Metz (57)</label>
        <label><input type="checkbox" name="ville" value="nevers">Nevers (58)</label>
        <label><input type="checkbox" name="ville" value="lille">Lille (59)</label>
        <label><input type="checkbox" name="ville" value="beauvais">Beauvais (60)</label>
        <label><input type="checkbox" name="ville" value="alencon">Alençon (61)</label>
        <label><input type="checkbox" name="ville" value="arras">Arras (62)</label>
        <label><input type="checkbox" name="ville" value="clermont">Clermont-Ferrand (63)</label>
        <label><input type="checkbox" name="ville" value="pau">Pau (64)</label>
        <label><input type="checkbox" name="ville" value="tarbes">Tarbes (65)</label>
        <label><input type="checkbox" name="ville" value="perpignan">Perpignan (66)</label>
        <label><input type="checkbox" name="ville" value="strasbourg">Strasbourg (67)</label>
        <label><input type="checkbox" name="ville" value="colmar">Colmar (68)</label>
        <label><input type="checkbox" name="ville" value="lyon">Lyon (69)</label>
        <label><input type="checkbox" name="ville" value="vesoul">Vesoul (70)</label>
        <label><input type="checkbox" name="ville" value="macon">Mâcon (71)</label>
        <label><input type="checkbox" name="ville" value="lemans">Le Mans (72)</label>
        <label><input type="checkbox" name="ville" value="chambery">Chambéry (73)</label>
        <label><input type="checkbox" name="ville" value="annecy">Annecy (74)</label>
        <label><input type="checkbox" name="ville" value="paris">Paris (75)</label>
        <label><input type="checkbox" name="ville" value="rouen">Rouen (76)</label>
        <label><input type="checkbox" name="ville" value="melun">Melun (77)</label>
        <label><input type="checkbox" name="ville" value="versailles">Versailles (78)</label>
        <label><input type="checkbox" name="ville" value="niort">Niort (79)</label>
        <label><input type="checkbox" name="ville" value="amiens">Amiens (80)</label>
        <label><input type="checkbox" name="ville" value="albi">Albi (81)</label>
        <label><input type="checkbox" name="ville" value="montauban">Montauban (82)</label>
        <label><input type="checkbox" name="ville" value="toulon">Toulon (83)</label>
        <label><input type="checkbox" name="ville" value="avignon">Avignon (84)</label>
        <label><input type="checkbox" name="ville" value="larochesuryon">La-Roche-sur-Yon (85)</label>
        <label><input type="checkbox" name="ville" value="poitiers">Poitiers (86)</label>
        <label><input type="checkbox" name="ville" value="limoges">Limoges (87)</label>
        <label><input type="checkbox" name="ville" value="epinal">Epinal (88)</label>
        <label><input type="checkbox" name="ville" value="auxerre">Auxerre (89)</label>
        <label><input type="checkbox" name="ville" value="belfort">Belfort (90)</label>
        <label><input type="checkbox" name="ville" value="evry">Evry (91)</label>
        <label><input type="checkbox" name="ville" value="nanterre">Nanterre (92)</label>
        <label><input type="checkbox" name="ville" value="bobigny">Bobigny (93)</label>
        <label><input type="checkbox" name="ville" value="creteil">Créteil (94)</label>
        <label><input type="checkbox" name="ville" value="pontoise">Pontoise (95)</label>
        <br><br>
        <input type="submit" name="submit_search" value="Lancer la recherche">
</form>
</section>

<div class="slider">
    <ul class="slides">

    </ul>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="include/menu.js"></script>
<script>

    $(document).ready(function () {
        $('#result').fadeToggle("fast");

        $('#form').on('submit', function (e) {
            e.preventDefault();
            $('#result').fadeIn();

            var genre = [];
            var loisir = [];
            var age = $("#age").val();
            var ville = [];

            $.each($("input[name='ville']:checked"), function () {
                ville.push($(this).val());
            });

            $.each($("input[name='genre']:checked"), function () {
                genre.push($(this).val());
            });

            $.each($("input[name='loisir']:checked"), function () {
                loisir.push($(this).val());
            });

            if (genre.length <= 0) {
                $("#result").fadeIn().text("Genre manquant");
                return false;
            }

            if (age == "") {
                $("#result").fadeIn().text("Age manquant");
                $("#age").focus();
                return false;
            }

            $.ajax({
                type: "POST",
                url: 'Handler/SearchHandler.php',
                data: {genre: genre, loisir: loisir, ville: ville, age: age},
                success: function (data) {
                    $(".slides").html(data);

                    var slider = $('.slides');

                    setInterval(function() {
                        slider.animate({
                            marginLeft : "-100px"
                        }, 800);
                    }, 2000);
                }
            });
        });
    });
</script>
</body>
</html>