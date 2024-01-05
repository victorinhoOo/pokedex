<h1>Pokédex de <?= $nomDresseur ?></h1>


<?php foreach ($allPokemons as $pokemon): ?>
        <tr>
            <td class="table-data"><?= $pokemon->getIdPokemon() ?></td>
            <td class="table-data"><?= $pokemon->getNomEspece() ?></td>
            <td class="table-data"><?= $pokemon->getDescription() ?></td>
            <td class="table-data"><?= ucfirst($pokemon->getTypeOne()) ?></td>
            <td class="table-data"><?= $pokemon->getTypeTwo() ? ucfirst($pokemon->getTypeTwo()) : 'Aucun' ?></td>
            <td class="table-data"><img class="image" src =<?= $pokemon->getUrlImg() ?>></img></td>
            <td class="table-data">
                <a href="index.php?action=updatePokemon&idPokemon=<?= $pokemon->getIdPokemon(); ?>"><i class="fas fa-pencil-alt option-icon"></i></a>
                <a href="index.php?action=deletePokemon&idPokemon=<?= $pokemon->getIdPokemon(); ?>"><i class="fas fa-trash option-icon"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>