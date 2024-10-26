<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/1169/1169608.png" type="image/png">         
    <title>Pokédex de Victor</title>
</head>

<body>
    <header>
        <nav class="menu">
            <a href="https://iutdijon.u-bourgogne.fr/www/" class="menu-item"><img src="https://iutdijon.u-bourgogne.fr/www/wp-content/uploads/2023/07/IMAG_changement_logo_rentree_2023.jpg" class="iut-link"></a>
            <a href="index.php" class="menu-item"><i class="fas fa-home"></i> Accueil</a>
            <a href="index.php?action=add-pokemon" class="menu-item"><i class="fas fa-plus-circle"></i> Ajouter un pokémon</a>
            <a href="index.php?action=add-type" class="menu-item"><i class="fas fa-plus-circle"></i> Ajouter un type</a>
            <a href="index.php?action=search" class="search-nav"><i class="fas fa-search"></i> Rechercher</a>
        </nav>
    </header>

    <div class="background">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
         </div>

    <main id="contenu">
        <?= $contenu ?>
    </main>        

    <footer>
        <p>TP Pokédex - Victor Duboz - Tout droits réservés</p>
    </footer>

</body>

</html>