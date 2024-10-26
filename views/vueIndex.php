<h1>Pokédex de
    <?= $nomDresseur ?>
</h1>

<?php if (isset($message)): ?>
    <h3><?= $message ?></h3>
<?php endif; ?>

<table class="pokemon-table">
    <thead>
        <tr>
            <th class="table-header">Id</th>
            <th class="table-header">Nom</th>
            <th class="table-header">Description</th>
            <th class="table-header">Type principal</th>
            <th class="table-header">Type secondaire</th>
            <th class="table-header">Illustration</th>
            <th class="table-header">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allPokemons as $pokemon): ?>
            <tr>
                <td class="table-data">
                    <?= $pokemon->getIdPokemon() ?>
                </td>
                <td class="table-data">
                    <?= $pokemon->getNomEspece() ?>
                </td>
                <td class="table-data">
                    <?= $pokemon->getDescription() ?>
                </td>
                <td class="table-data">
                    <?php if ($textMode): ?>
                        <?= ucfirst($pokemon->getTypeOne()->getNomType()) ?>
                    <?php else: ?>
                        <img class="type" src="<?= $pokemon->getTypeOne()?->getUrlImg() ?>">
                    <?php endif; ?>
                </td>

                <td class="table-data">
                    <?php if ($pokemon->getTypeTwo()) : ?>
                        <?php if ($textMode): ?>
                            <?= ucfirst($pokemon->getTypeTwo()->getNomType()) ?>
                        <?php else: ?>
                            <img class="type" src="<?= $pokemon->getTypeTwo()?->getUrlImg() ?>">
                        <?php endif; ?>
                    <?php else : ?>
                        Aucun
                    <?php endif; ?>
                </td>

                <td class="table-data"><img class="image" src=<?= $pokemon->getUrlImg() ?>></img></td>
                <td class="table-data">
                    <a href="index.php?action=update-pokemon&idPokemon=<?= $pokemon->getIdPokemon(); ?>"><i
                            class="fas fa-pencil-alt option-icon"></i></a>
                    <a href="index.php?action=delete-pokemon&idPokemon=<?= $pokemon->getIdPokemon(); ?>"><i
                            class="fas fa-trash option-icon"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>