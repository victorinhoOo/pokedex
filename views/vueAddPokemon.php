<?php if (!empty($pokemonToEdit)) : ?>
    <h1 class="TitrePages">Modification de <?= htmlspecialchars($pokemonToEdit->getNomEspece()) ?></h1>
<?php else : ?>
    <h1 class="TitrePages">Ajouter un Pokémon</h1>
<?php endif; ?>

<form action="index.php?action=<?= !empty($pokemonToEdit) ? 'edit-pokemon' : 'add-pokemon' ?>" method="post">
    <div class="form-group">
        <label for="nomEspece">Nom de l'espèce :</label>
        <input type="text" id="nomEspece" name="nomEspece" required value="<?= !empty($pokemonToEdit) ? htmlspecialchars($pokemonToEdit->getNomEspece()) : '' ?>">
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="6"><?= !empty($pokemonToEdit) ? htmlspecialchars($pokemonToEdit->getDescription()) : '' ?></textarea>
    </div>

    <div class="form-group">
        <label for="typeOne">Type principal :</label>
        <input type="text" id="typeOne" name="typeOne" required value="<?= !empty($pokemonToEdit) ? htmlspecialchars($pokemonToEdit->getTypeOne()) : '' ?>">
    </div>

    <div class="form-group">
        <label for="typeTwo">Type secondaire :</label>
        <input type="text" id="typeTwo" name="typeTwo" value="<?= !empty($pokemonToEdit) ? htmlspecialchars($pokemonToEdit->getTypeTwo()) : '' ?>">
    </div>

    <div class="form-group">
        <label for="urlImg">URL de l'image :</label>
        <input type="text" id="urlImg" name="urlImg" value="<?= !empty($pokemonToEdit) ? htmlspecialchars($pokemonToEdit->getUrlImg()) : '' ?>">
    </div>

    <?php if (!empty($pokemonToEdit)) : ?>
        <input type="hidden" id="idPokemon" name="idPokemon" value="<?= $pokemonToEdit->getIdPokemon() ?>">
    <?php endif; ?>

    <input type="submit" value="<?= !empty($pokemonToEdit) ? 'Modifier' : 'Ajouter' ?>">
</form>