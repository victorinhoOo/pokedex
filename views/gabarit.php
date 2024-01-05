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
        <!-- Menu -->
        <nav class="menu">
            <a href="#" class="menu-item">Accueil</a>
            <a href="#" class="menu-item">Pokémon</a>
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