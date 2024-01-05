<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="public/css/main.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
                
    <title>Pokédex de Victor</title>
</head>

<body>
    <header>
        <nav class="menu">
            <a href="https://iutdijon.u-bourgogne.fr/www/" class="menu-item"><img src="https://iutdijon.u-bourgogne.fr/www/wp-content/uploads/2023/07/IMAG_changement_logo_rentree_2023.jpg" class="iut-link"></a>
            <a href="index.php" class="menu-item">Accueil</a>
            <a href="index.php?action=add-pokemon" class="menu-item">Ajouter un pokémon</a>
            <a href="index.php?action=add-pokemon-type" class="menu-item">Ajouter un type</a>
            <a href="index.php?action=search" class="menu-item">Rechercher</a>
        </nav>
    </header>
    <!-- #contenu -->
    <main id="contenu">        
        <table class="pokemon-table">
            <thead>
                <tr>
                    <th class="table-header">Id</th>
                    <th class="table-header">Nom</th>
                    <th class="table-header">Description</th>
                    <th class="table-header">Type 1</th>
                    <th class="table-header">Type 2</th>
                    <th class="table-header">Illustration</th>
                    <th class="table-header">Options</th>
                </tr>
            </thead>
            <tbody>
                <?= $contenu ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>TP Pokédex - Victor Duboz - Tout droits réservés</p>
    </footer>
</body>

</html>