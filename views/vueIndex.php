<h1>Pokédex de <?= $nomDresseur ?></h1>


<?php foreach ($allPokemons as $pokemon): ?>
        <tr>
            <td class="table-data"><?= $pokemon->getIdPokemon() ?></td>
            <td class="table-data"><?= $pokemon->getNomEspece() ?></td>
            <td class="table-data"><?= $pokemon->getDescription() ?></td>
            <td class="table-data"><?= ucfirst($pokemon->getTypeOne()) ?></td>
            <td class="table-data"><?= $pokemon->getTypeTwo() ? ucfirst($pokemon->getTypeTwo()) : 'Aucun' ?></td>
            <td class="table-data"><img class="image" src =<?= $pokemon->getUrlImg() ?>></img></td>
            <td class="table-data"></td>
        </tr>
    <?php endforeach; ?>